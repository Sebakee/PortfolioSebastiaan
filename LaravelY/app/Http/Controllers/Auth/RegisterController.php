<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware([('guest')]);
    }

    public function index()
    {
        return view('auth.register');
    }
    
    public function store(Request $request)
    {
       //validate
       $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'password' => 'required|confirmed',
       ]);

       //store
       User::create([
        'name' => $request->name, 
        'email' => $request->email, 
        'password' => $request->password
       ]);

        //sign the user in
        auth()->attempt($request->only('email', 'password'));

        //redirect
        return redirect()->route('dashboard');
    }
}