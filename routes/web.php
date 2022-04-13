<?php

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

Route::get('/', function () { return view('welcome'); });
Route::view('/admin', 'admin.dashboard');
Route::view('/admin/user', 'admin.page.user.index');
Route::view('/admin/user/create', 'admin.page.user.create');
Route::view('/admin/user/profile', 'admin.page.user.profile');
Route::view('/login', 'auth.login');
Route::view('/register', 'auth.register');
Route::view('/forget-password', 'auth.forget-password');
Route::view('/reset-password', 'auth.reset-password');
Route::view('/verify-email', 'auth.verify-email');
Route::view('/two-factor', 'auth.two-factor-challenge');
