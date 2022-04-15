<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\User\ProfileController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Jenssegers\Agent\Agent;

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
            Route::delete('/session/{session:user_id}', [ProfileController::class, 'destroy'])->name('admin.user.profile.session.destroy');
        });

    });

});
