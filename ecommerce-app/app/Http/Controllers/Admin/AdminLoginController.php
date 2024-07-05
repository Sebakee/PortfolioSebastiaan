<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Hash;
use App\Models\User;

class AdminLoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function admincheck(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
            return redirect()->intended('admin/dashboard');
        }
        else{
            session()->flash('error', 'invalid Credentials');
            return redirect()->route('admin.login');
        }

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('admin/login');
    }
}
