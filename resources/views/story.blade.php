@extends('layouts.master')

@section('title', $story->title)

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
        </div>
    </main>
@endsection