<x-layout>
    <x-slot:title>
        Админ-панель
    </x-slot:title>

    <x-slot:button>
        <a href="" class="exit-button">Выход</a>
    </x-slot:button>
    <link rel="stylesheet" href="{{ asset('css/adminStyles.css') }}">
    <main>
        <h2>Объявления на модерацию</h2>

        @foreach($stories as $story)
            <div class="awaiting-story">
                <div class="story-title">{{$story->title}}</div>
                <div class="story-content">{{$story->text}}</div>
                <div class="story-tags">
                    @foreach ($story->tags as $tag)
                        <a href="{{ route('index', ['query' => '#' . $tag->hashtag]) }}" class="tag">#{{$tag->hashtag}}</a>
                    @endforeach
                </div>
                <div class="awaiting-story-footer">
                    <span class="story-date">Добавлено: 2024-12-17</span>
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
</x-layout>
