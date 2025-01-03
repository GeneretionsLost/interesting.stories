@extends('layouts.master')

@section('title', 'Главная страница')

@section('styles')
    @auth()
        <link rel="stylesheet" href="{{ asset('css/adminStyles.css') }}">
        <style>
            main {
                max-width: 800px;
            }
        </style>
    @endauth
@endsection

@section('button')
    <a href="{{ route('create') }}" class="add-button">Добавить</a>
@endsection

@section('content')
    <div class="search-container">
        <form action="" method="GET">
            <input type="text" name="query" class="search-input" placeholder="Поиск..." value="{{ request('query') }}">
        </form>
    </div>


    <main>
        <h2>Новые сюжеты</h2>

        @foreach($stories as $story)
            <div class="story">
                <a href="{{ route('show', $story->id) }}" class="story-title">{{$story->title}}</a>
                <div class="story-content">
                    {{$story->text}}
                </div>
                <div class="story-tags">
                    @foreach ($story->tags as $tag)
                        <a href="{{ route('index', ['query' => '#' . $tag->hashtag]) }}" class="tag">#{{$tag->hashtag}}</a>
                    @endforeach
                </div>
            </div>
        @endforeach
        {{$stories->links()}}
    </main>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
@endsection




