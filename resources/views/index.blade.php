<x-layout>
    <x-slot:title>
        Главная страница
    </x-slot:title>

    <x-slot:button>
        <a href="{{ route('create') }}" class="add-button">Добавить</a>
    </x-slot:button>

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

    <script src="{{ asset('js/scripts.js') }}"></script>

</x-layout>



