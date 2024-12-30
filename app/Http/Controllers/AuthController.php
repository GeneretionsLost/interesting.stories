<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Показать форму авторизации
    public function showLoginForm()
    {
        return view('auth');
    }

    // Обработка данных авторизации
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Авторизация успешна
            return redirect()->route('admin');
        }

        // Ошибка авторизации
        return redirect()->route('auth')->withErrors([
            'email' => 'Неверные данные для входа.',
        ]);
    }
}
