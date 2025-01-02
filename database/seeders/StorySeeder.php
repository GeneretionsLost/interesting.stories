<?php

namespace Database\Seeders;

use App\Models\Story;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Создаем несколько постов
        $posts = Story::factory(50)->create();

        // Создаем несколько тегов
        $tags = Tag::factory(10)->create();

        // Присваиваем теги постам
        $posts->each(function ($post) use ($tags) {
            $post->tags()->attach(
                $tags->random(rand(2, 5))->pluck('id')->toArray()
            );
        });
    }
}
