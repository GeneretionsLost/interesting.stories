@extends('layouts.master')

@section('title', 'Админ-панель')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/adminStyles.css') }}">
    <style>
        main {
            max-width: 1000px;
        }
    </style>
@endsection

@section('button')
    <form method="POST" action="{{ route('logout') }}" class="exit-button-form">
        @csrf
        <button type="submit" class="exit-button">Выйти</button>
    </form>
@endsection

@section('content')
    <main>
        <h2>Объявления на модерацию</h2>

        @foreach($stories as $story)
            <div class="awaiting-story">
                <a href="{{ route('show', $story->id) }}" class="story-title">{{$story->title}}</a>
                <div class="story-content">{{$story->text}}</div>
                <div class="story-tags">
                    @foreach ($story->tags as $tag)
                        <a href="{{ route('index', ['query' => '#' . $tag->hashtag]) }}" class="tag">#{{$tag->hashtag}}</a>
                    @endforeach
                </div>
                <div class="awaiting-story-footer">
                    <span class="story-date">Добавлено: {{ $story->created_at->format('d.m.Y') }}</span>
                    <div>
                        <form action="{{ route('update', $story->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="approve">Подтвердить</button>
                        </form>
                        <form action="{{ route('delete', $story->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="reject">Отклонить</button>
                        </form>
                    </div>
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