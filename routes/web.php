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


Route::prefix('/admin')->middleware(['auth', 'verified'])->group(function () {

    //Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    //User
    Route::prefix('user')->group(function () {

        //users
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');

        //profile
        Route::prefix('/profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('admin.user.profile');
            Route::delete('/session/{session:payload}', [ProfileController::class, 'destroy'])->name('admin.user.profile.session.destroy');
        });

    });

    //role
    Route::prefix('role')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('admin.role.index');
        Route::post('/store', [UserController::class, 'store'])->name('admin.role.store');
        Route::delete('/destroy/{role}', [UserController::class, 'destroy'])->name('admin.role.destroy');
    });

    //permission
    Route::prefix('permission')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('admin.permission.index');
        Route::post('/store', [PermissionController::class, 'store'])->name('admin.permission.store');
        Route::delete('/destroy/{permission}', [PermissionController::class, 'destroy'])->name('admin.permission.destroy');
    });

});
