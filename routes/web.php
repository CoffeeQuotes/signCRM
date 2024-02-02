<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LeadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {

    Route::match(['get', 'post'], 'login', [AdminController::class, 'login'])->name('login');

    Route::middleware(['admin'])->group(function () {
        // sandbox route
        // Route::get('index', [AdminController::class, 'index']);
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
       
        // Person
        Route::match(['get', 'post'], 'add-edit-person/{id?}', [LeadController::class, 'addPerson'])->name('admin_add_edit_person');
        Route::get('persons', [LeadController::class, 'persons'])->name('admin_persons');

        // Organization 
        Route::match(['get', 'post'], 'add-edit-organization/{id?}', [LeadController::class, 'addOrganization'])->name('admin_add_edit_organization');
        Route::get('organization',[LeadController::class, 'organizations'])->name('admin_organizations');
    });
});
