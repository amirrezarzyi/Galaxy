<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\User\ProfileController;
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

Route::get('/', function () { return view('welcome'); });
// Route::view('/admin', 'admin.dashboard');
// Route::view('/admin/user', 'admin.page.user.index');
// Route::view('/admin/user/create', 'admin.page.user.create');
// Route::view('/admin/user/profile', 'admin.page.user.profile');
// Route::get('/admin/user/profile', function () {
//     return view('admin.page.user.profile', [
//         'agent' => new Agent(),
//     ]);
// });
// Route::view('/login', 'auth.login');
// Route::view('/register', 'auth.register');
// Route::view('/forget-password', 'auth.forget-password');
// Route::view('/reset-password', 'auth.reset-password');
// Route::view('/verify-email', 'auth.verify-email');
// Route::view('/two-factor', 'auth.two-factor-challenge');

Route::prefix('/admin')->middleware(['auth','verified'])->group(function() {

    //Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    //profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::delete('/profile/session/{session:user_id}', [ProfileController::class,'destroy'])->name('admin.profile.session.destroy');
});



