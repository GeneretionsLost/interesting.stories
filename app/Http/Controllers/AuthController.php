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
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin');
        }

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Завершаем сессию пользователя

        // Очистка сессии (опционально)
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('index'));
    }
}
