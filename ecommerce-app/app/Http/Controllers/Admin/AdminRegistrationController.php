<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Hash;
use App\Models\User;


class AdminRegistrationController extends Controller
{
    public function create(){
        return view('admin.create');
    }

    public function store(Request $request){
        $input = $request->all();
        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' =>bcrypt($input['password']),
            'role' => 'admin'
        ]);

        return view('admin.thank');
    }
}
