<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $user = $request->validated();

        if (Auth::attempt($user)) {
            return redirect()->route('category.index')->with('success', 'Вы успешно вошли');
        }


        return redirect()->route('login')->with('error', 'Вы ввели неверные данные');

    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
