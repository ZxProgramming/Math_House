<?php

use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\login\LoginController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/Users/RoleAdmin', [UserController::class, 'role_admins'])->name('role_admins_list');
Route::post('/Users/RoleAdmin/Edit', [UserController::class, 'role_admin_edit'])->name('role_admin_edit');
Route::get('/Users/RoleAdmin/Del/{id}', [UserController::class, 'role_del_admin'])->name('role_del_admin');
Route::get('/Users/Admin', [UserController::class, 'admins'])->name('admins_list');
Route::post('/Users/Admin/Filter', [UserController::class, 'admin_filter'])->name('admin_filter');

// Students  
Route::get('/Users/Student', [UserController::class, 'student'])->name('student');
Route::get('/Users/Student/Info', [UserController::class, 'stu_info'])->name('stu_info');
Route::get('/Users/Add_Student', [UserController::class, 'add_student'])->name('add_student');
Route::post('/Users/Student/Add', [UserController::class, 'student_add'])->name('student_add');
Route::post('/Users/Student/Edit', [UserController::class, 'stu_edit'])->name('stu_edit');
//  Hello MR Ahmed 

Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::post('/Users/Admin/Edit', [UserController::class, 'admin_edit'])->name('admin_edit');
Route::get('/Users/Admin/Del/{id}', [UserController::class, 'del_admin'])->name('del_admin');
Route::get('/Users/Admin_Add', [UserController::class, 'admin_add'])->name('admin_add');
Route::post('/Users/Admin/Add', [UserController::class, 'add_admin'])->name('add_admin');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::resource('/user-management/permissions', PermissionManagementController::class);
    });

});




Route::controller(LoginController::class)->group(function(){
    Route::get('/login','index')->name('login.index');
    Route::post('/login','store')->name('login.store');
    Route::get('/logout','destroy')->name('logout');
    
  });