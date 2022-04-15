<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('admin.page.user.index');
    }

    public function create(){
        return view('admin.page.user.create');
    }
}
