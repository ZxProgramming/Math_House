<?php

use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Auth\SocialiteController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
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
Route::post('/Users/Admin/Edit', [UserController::class, 'admin_edit'])->name('admin_edit');
Route::get('/Users/Admin/Del/{id}', [UserController::class, 'del_admin'])->name('del_admin');
Route::get('/Users/Admin_Add', [UserController::class, 'admin_add'])->name('admin_add');


Route::middleware(['auth', 'verified'])->group(function () {



    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::resource('/user-management/permissions', PermissionManagementController::class);
    });

});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
