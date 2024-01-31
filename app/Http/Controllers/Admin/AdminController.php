<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    /**
     * 
     * Sandbox func
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * 
     * Login func [GET, POST]
     * @param Request $request
     * **/
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required|max:20|min:6',
            ];
            $customMessage = [
                'email.required' => 'Please provide the email id or contact administrator.',
                'email.email' => 'Please check your email, only valid email is accepted.',
                'password.required' => 'Please provide the password.'
            ];

            $this->validate($request, $rules, $customMessage);

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect()->route('admin_dashboard');
            } else {
                return redirect()->back()->with("error_message", "Invalid credentials.");
            }
        }
        return view('admin.login');
    }

    /***
     *  Dashboard func
     * **/
    public function dashboard()
    {
        return view('admin.index');
    }
}
