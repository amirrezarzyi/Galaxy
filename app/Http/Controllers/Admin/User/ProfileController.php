<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;
use Morilog\Jalali\Jalalian;

class ProfileController extends Controller
{
    public function index()
    { 
        $agent = new Agent();
        $sessions = DB::table('sessions')->where('user_id', '=', Auth::user()->id)->orderby('last_activity','DESC')->get();

        return view('admin.page.user.profile',compact('sessions','agent'));
    }

    public function destroy(Session $session)
    {
        $session->delete();
        return redirect()->route('admin.profile');
    }
}
