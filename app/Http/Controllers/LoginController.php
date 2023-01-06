<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        dd($request->all());
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
