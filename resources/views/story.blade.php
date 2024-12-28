<x-layout>
    <x-slot:title>
        {{$story->title}}
    </x-slot:title>

    <x-slot:button>
        <a href="{{ route('index') }}" class="add-button">Назад</a>
    </x-slot:button>
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
</x-layout>

