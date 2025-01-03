@extends('layouts.master')

@section('title','Новая история')

@section('styles')
    @auth()
        <link rel="stylesheet" href="{{ asset('css/adminStyles.css') }}">
        <style>
            main {
                max-width: 800px;
            }
            .submit-button {
                background-color: #00796b;
            }
        </style>
    @endauth
@endsection

@section('button')
    <a href="{{ route('index') }}" class="add-button">Назад</a>
@endsection

@section('content')
    <main>
        <section id="add-story">
            <h2>Добавить Историю</h2>
            <form method="POST" action="{{ route('store') }}">
                @csrf
                <input type="text" name="title" placeholder="Название истории" required>
                <textarea name="content" rows="5" placeholder="Текст истории" required></textarea>
                <input type="text" name="tags" placeholder="Введите метки через запятую (например: #метка1, #метка2)">
                <button type="submit" class="submit-button">Добавить</button>
            </form>
        </section>
    </main>
@endsection

