<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $rounds = 100;

        $data = [];
        $tags = [];
        $storyTags = [];
        $i = 0;

        // Создание историй
        while ($i < $rounds) {
            $nameLength = mt_rand(10, 50);
            $textLength = mt_rand(100, 1000);
            $tagLength = mt_rand(5, 15);

            $storyId = $i + 1;

            // Добавляем историю
            $data[] = [
                'title' => Str::random($nameLength),
                'text' => Str::random($textLength),
            ];

            // Создаем от 2 до 5 тегов для каждой истории
            $numTags = mt_rand(2, 5); // От 2 до 5 тегов на историю
            $currentTags = [];
            for ($j = 0; $j < $numTags; $j++) {
                $tag = Str::random($tagLength);
                // Добавляем тег
                $tags[] = [
                    'hashtag' => $tag,
                ];

                // Собираем ID тегов для связывания с историями
                $tagId = count($tags); // ID тега соответствует его индексу в массиве
                $currentTags[] = $tagId;

                // Создаем связь между историей и тегом
                $storyTags[] = [
                    'story_id' => $storyId,
                    'tag_id' => $tagId,
                ];
            }

            $i++;
        }

        // Начало транзакции
        DB::beginTransaction();

        try {
            // Вставка данных в таблицы
            DB::table('stories')->insert($data);
            DB::table('tags')->insert($tags);
            DB::table('story_tag')->insert($storyTags); // Вставка данных в таблицу связывания

            // Подтверждение транзакции
            DB::commit();
        } catch (\Exception $e) {
            // Откат транзакции в случае ошибки
            DB::rollBack();

            // Логирование ошибки или дальнейшая обработка
            throw $e;
        }
    }
}
