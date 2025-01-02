@extends('layouts.master')

@section('title', 'Авторизация')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/adminStyles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('button')
    <a href="{{ route('index') }}" class="add-button">Назад</a>
@endsection

@section('content')
    <main>
        <h2>Авторизация</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Имя пользователя" required autofocus>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit" class="submit-button">Войти</button>
        </form>
    </main>
@endsection