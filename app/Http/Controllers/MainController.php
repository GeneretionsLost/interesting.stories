<?php

namespace App\Http\Controllers;


use App\Models\Story;
use App\Models\Tag;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $query = ltrim($request->input('query'), '#');

        if ($query) {
            // Поиск по тегам, а также по заголовку и тексту истории
            $stories = Story::where(function ($queryBuilder) use ($query) {
                // Поиск по тегам
                $queryBuilder->whereHas('tags', function ($tagQueryBuilder) use ($query) {
                    $tagQueryBuilder->where('hashtag', $query);
                })
                    // Поиск по названию и тексту истории
                    ->orWhere('title', 'like', '%' . $query . '%')
                    ->orWhere('text', 'like', '%' . $query . '%');
            })
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        } else {
            // Если нет строки поиска, то просто отображаем все истории
            $stories = Story::orderBy('created_at', 'desc')
                ->paginate(5);
        }

        return view('index', compact('stories'));
    }



    public function create()
    {
        return view('add');
    }

    public function store(Request $request)
    {
        // Валидация данных формы
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'required|string',
        ]);

        // Создание новой истории
        $story = Story::create([
            'title' => $validated['title'],
            'text' => $validated['content'],
        ]);

        // Обработка тегов
        if (!empty($validated['tags'])) {
            $tags = array_map('trim', explode(',', $validated['tags'])); // Разбиваем строку на массив
            $tagIds = [];

            foreach ($tags as $tag) {
                $tag = ltrim($tag, '#'); // Убираем символ #
                $existingTag = Tag::firstOrCreate(['hashtag' => $tag]);
                $tagIds[] = $existingTag->id;
            }

            // Привязываем теги к истории
            $story->tags()->attach($tagIds);
        }

        return redirect()->route('index')->with('success', 'История отправлена на модерацию!');
    }

    public function show(Story $story)
    {
        return view('story', compact('story'));
    }

    public function admin()
    {
        return view('admin');
    }

}
