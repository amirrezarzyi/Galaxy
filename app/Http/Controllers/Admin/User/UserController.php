<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use PasswordValidationRules;

    public function index(){
        $users = User::orderby('id','DESC')->paginate(2);;
        return view('admin.page.user.index',compact('users'));
    }

    public function create(){
        return view('admin.page.user.create');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' =>
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            'password' => $this->passwordRules(),
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('admin.user.index');
    }

}
