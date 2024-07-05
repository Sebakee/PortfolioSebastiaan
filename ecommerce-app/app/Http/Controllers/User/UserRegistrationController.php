<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Hash;
use App\Models\User;

class UserRegistrationController extends Controller
{
    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        $input = $request->all();
        User::create(['name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
    ]);

    return view('user.thank');
    }
}
