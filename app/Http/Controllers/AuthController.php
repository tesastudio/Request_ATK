<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect(url(''));
    }
    // public function login(){
    //     return redirect()->route('login');
    // }
}
