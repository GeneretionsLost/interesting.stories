@extends('layouts.master')

@section('title', $story->title)

@section('styles')
    @auth()
        <link rel="stylesheet" href="{{ asset('css/adminStyles.css') }}">
    @endauth
@endsection

@section('button')
    <a href="{{ route('index') }}" class="add-button">Назад</a>
@endsection

@section('content')
    <main>
        <div class="story">
            <div class="story-title">{{$story->title}}</div>
            <div class="story-content">
                {{$story->text}}
            </div>
            <div class="story-tags">
                @foreach ($story->tags as $tag)
                    <span class="tag"># {{$tag->hashtag}}</span>
                @endforeach
            </div>
            @auth()
                <div class="awaiting-story-footer">
                    <span class="story-date">Добавлено: {{ $story->created_at->format('d.m.Y') }}</span>
                    <div>
                        @if(!$story->is_moderated)
                            <form action="{{ route('update', $story->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="approve">Подтвердить</button>
                            </form>
                        @endif

                        <form action="{{ route('delete', $story->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="reject">
                                {{ $story->is_moderated ? 'Удалить' : 'Отклонить' }}
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

        </div>
    </main>
@endsection