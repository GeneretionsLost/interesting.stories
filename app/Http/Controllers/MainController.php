<?php

namespace App\Http\Controllers;


use App\Models\Story;
use App\Models\Tag;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $trimmedQuery = ltrim($query, '#');

        if ($query) {
            $stories = Story::where('is_moderated', true)
                ->where(function ($queryBuilder) use ($query, $trimmedQuery) {
                    if (str_starts_with($query, '#')) {
                        // Искать только по тегам
                        $queryBuilder->whereHas('tags', function ($tagQueryBuilder) use ($trimmedQuery) {
                            $tagQueryBuilder->where('hashtag', $trimmedQuery);
                        });
                    } else {
                        // Искать по заголовку или тексту
                        $queryBuilder->where('title', 'like', '%' . $trimmedQuery . '%')
                            ->orWhere('text', 'like', '%' . $trimmedQuery . '%');
                    }
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10)
                ->appends(['query' => $query]);

        } else {
            $stories = Story::where('is_moderated', true)
                ->orderBy('updated_at', 'desc')
                ->paginate(10);
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
            'is_moderated' => auth()->check() ? true : false, // Устанавливаем is_moderated для авторизованных пользователей
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

        // Возвращение без флеша для авторизованных пользователей
        if (auth()->check()) {
            return redirect()->route('index')->with('success', 'История №' . $story->id . ' была добавлена');
        }

        return redirect()->route('index')->with('warning', 'История отправлена на модерацию!');
    }

    public function show(Story $story)
    {
        return view('story', compact('story'));
    }

    public function update($id)
    {
        $story = Story::findOrFail($id);
        $story->is_moderated = true;
        $story->save();

        return redirect()->route('admin')->with('success', 'История №' . $id . ' была добавлена');
    }

    public function delete($id)
    {

        $story = Story::findOrFail($id);

        $story->delete();

        return redirect()->route($story->is_moderated ? 'index' : 'admin')->with('danger', 'История №' . $id . ' была удалена');
    }
}
