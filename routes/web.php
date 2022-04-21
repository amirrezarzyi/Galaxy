<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\User\PermissionController;
use App\Http\Controllers\Admin\User\ProfileController;
use App\Http\Controllers\Admin\User\RoleController;
use App\Http\Controllers\Admin\User\UserController;
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

//Home
Route::get('/', function () { return view('welcome'); });

//Admin-Panel
Route::prefix('/admin')->middleware(['auth'])->group(function () {

    //Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    //Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::delete('/profile/session/{session:payload}', [ProfileController::class, 'destroy'])->name('admin.profile.session.destroy');

    //User
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/getUsers', [UserController::class, 'getUsers'])->name('admin.user.getUsers');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.user.store')->middleware(['role:سوپر ادمین']);
        Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy')->middleware(['role:سوپر ادمین']);
        Route::post('/set-role/{user}', [UserController::class, 'setRole'])->name('admin.user.set-role')->middleware(['role:سوپر ادمین']);
    });

    //Role
    Route::prefix('role')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('admin.role.index');
        Route::post('/store', [RoleController::class, 'store'])->name('admin.role.store')->middleware(['role:سوپر ادمین']);
        Route::put('/update/{role}', [RoleController::class, 'update'])->name('admin.role.update')->middleware(['role:سوپر ادمین']);
        Route::delete('/destroy/{role}', [RoleController::class, 'destroy'])->name('admin.role.destroy')->middleware(['role:سوپر ادمین']);
        Route::put('/update-permission/{role}', [RoleController::class, 'updatePermission'])->name('admin.role.update-permission')->middleware(['role:سوپر ادمین']);

    });

    //Permission
    Route::prefix('permission')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('admin.permission.index');
        Route::post('/store', [PermissionController::class, 'store'])->name('admin.permission.store')->middleware(['role:سوپر ادمین']);
        Route::delete('/destroy/{permission}', [PermissionController::class, 'destroy'])->name('admin.permission.destroy')->middleware(['role:سوپر ادمین']);
    });

});
