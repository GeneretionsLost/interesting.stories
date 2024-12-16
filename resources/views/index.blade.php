<x-layout>
    <x-slot:title>
        Главная страница
    </x-slot:title>

    <x-slot:button>
        <a href="{{ route('add') }}" class="add-button">Добавить</a>
    </x-slot:button>

    <main>
        <h2>Новые сюжеты</h2>

        @foreach($stories as $story)
            <div class="story">
                <div class="story-title">{{$story->name}}</div>
                <div class="story-content">
                    {{$story->text}}
                </div>
                <div class="story-tags">
                    @foreach ($story->tags as $tag)
                        <span class="tag"># {{$tag->hashtag}}</span>
                    @endforeach
                </div>
            </div>
        @endforeach

    </main>
</x-layout>



