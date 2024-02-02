<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Person, Organization};
use Illuminate\Http\Request;
use Auth;

class LeadController extends Controller
{
    /***
     * 
     * Persons
     */

    public function persons()
    {
        $persons = Person::get()->toArray();
        return view('admin.leads.persons')->with(compact('persons'));
    }
    /***
     *  Add new person 
     * **/
    public function addPerson(Request $request, $id = null)
    {

        if ($id == '') {
            $page_title = 'New Person';
            $person = new Person();
            $message = 'New person added successfully.';
        } else {
            $page_title = 'Edit Person';
            $person = Person::findOrFail($id);
            $message = 'Update person successfully.';
        }
        if ($request->isMethod('post')) {

            $rules = [
                'first_name' => 'required|regex:/^[\pL\s]+$/u|min:3|max:255',
                'last_name' => 'required|regex:/^[\pL\s]+$/u|min:3|max:255',
                'lead_group_id' => 'required',
            ];
            $customMessage = [
                // Firstname
                'first_name.required' => 'Please provide the firstname.',
                'first_name.regex' => 'Please only enter valid firstname.',
                'first_name.min' => 'Firstname must be atleast 3 characters long.',
                'first_name.max' => 'Firstname must be less than 255 characters.',
                // Lastname
                'last_name.required' => 'Please provide the lastname.',
                'last_name.regex' => 'Please only enter valid lastname.',
                'last_name.min' => 'Lastname must be atleast 3 characters long.',
                'last_name.max' => 'Lastname must be less than 255 characters.',
                // Lead Group
                'lead_group_id.required' => 'Please select valid lead group'
            ];

            $this->validate($request, $rules, $customMessage);
            $person->first_name = $request->first_name;
            $person->middle_name = $request->middle_name;
            $person->last_name = $request->last_name;
            $person->lead_group_id = $request->lead_group_id;
            $person->admin_id = Auth::guard('admin')->user()->id;
            if ($person->save()) {
                return redirect()->route('admin_persons')->with('success_message', $message);
            } else {
                return redirect()->route('admin_persons')->with('error_message', 'Something went wrong.');
            }
        }
        return view('admin.leads.add_edit')->with(compact('page_title', 'person'));
    }
    /***
     * 
     * Persons
     */

    public function organizations()
    {
        $organizations = Organization::get()->toArray();
        return view('admin.leads.organizations')->with(compact('organizations'));
    }
    /**
     * 
     * Organization
     * 
     */
    public function addOrganization(Request $request, $id = null)
    {

        if ($id == '') {
            $page_title = 'New Organization';
            $organization = new Organization();
            $message = 'New organization added successfully.';
        } else {
            $page_title = 'Edit organization';
            $organization = Organization::findOrFail($id);
            $message = 'Update person successfully.';
        }
        if ($request->isMethod('post')) {

            $rules = [
                'name' => 'required|regex:/^[\pL\s]+$/u|min:3|max:255',
                'lead_group_id' => 'required',
                'admin_id' => 'required'
            ];
            $customMessage = [
                // Firstname
                'name.required' => 'Please provide the firstname.',
                'name.regex' => 'Please only enter valid firstname.',
                'name.min' => 'Firstname must be atleast 3 characters long.',
                'name.max' => 'Firstname must be less than 255 characters.',
                // Lead Group
                'lead_group_id.required' => 'Please select valid lead group',
                'admin_id.required' => 'Please select owner'
            ];

            $this->validate($request, $rules, $customMessage);
            $organization->name = $request->name;
            $organization->lead_group_id = $request->lead_group_id;
            $organization->job_title = $request->job_title??'Not Available';
            $organization->admin_id = $request->admin_id;
            if ($organization->save()) {
                return redirect()->route('admin_organizations')->with('success_message', $message);
            } else {
                return redirect()->route('admin_organizations')->with('error_message', 'Something went wrong.');
            }
        }
        return view('admin.leads.add_edit_organization')->with(compact('page_title', 'organization'));
    }

    /***
     * addLeadGroup
     * */
    public function addLeadGroup(Request $request, $id = null)
    {
         if ($id == '') {
            $page_title = 'New Organization';
            $organization = new Organization();
            $message = 'New organization added successfully.';
        } else {
            $page_title = 'Edit organization';
            $organization = Organization::findOrFail($id);
            $message = 'Update person successfully.';
        }
        if ($request->isMethod('post')) {

            $rules = [
                'name' => 'required|regex:/^[\pL\s]+$/u|min:3|max:255',
                'lead_group_id' => 'required',
                'admin_id' => 'required'
            ];
            $customMessage = [
                // Firstname
                'name.required' => 'Please provide the firstname.',
                'name.regex' => 'Please only enter valid firstname.',
                'name.min' => 'Firstname must be atleast 3 characters long.',
                'name.max' => 'Firstname must be less than 255 characters.',
                // Lead Group
                'lead_group_id.required' => 'Please select valid lead group',
                'admin_id.required' => 'Please select owner'
            ];

            $this->validate($request, $rules, $customMessage);
            $organization->name = $request->name;
            $organization->lead_group_id = $request->lead_group_id;
            $organization->job_title = $request->job_title??'Not Available';
            $organization->admin_id = $request->admin_id;
            if ($organization->save()) {
                return redirect()->route('admin_organizations')->with('success_message', $message);
            } else {
                return redirect()->route('admin_organizations')->with('error_message', 'Something went wrong.');
            }
        }
        return view('admin.leads.add_edit_organization')->with(compact('page_title', 'organization'));   
    }
}
