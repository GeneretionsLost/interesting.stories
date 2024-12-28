<x-layout>
    <x-slot:title>
        Админ-панель
    </x-slot:title>

    <x-slot:button>
        <a href="" class="exit-button">Выход</a>
    </x-slot:button>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        header {
            background-color: #00796b;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }

        main {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: white;
        }

        h1 {
            text-align: center;
            color: #00796b;
        }

        .add {
            display: flex;
            flex-direction: column;
            gap: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            background-color: #fff;
            margin-bottom: 20px;
        }

        .add-title {
            font-size: 18px;
            font-weight: bold;
        }

        .add-content {
            margin-bottom: 10px;
        }

        .add-tags {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }

        .tag {
            background-color: #e0f7fa;
            color: #00796b;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
        }

        .add-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        button {
            padding: 10px 15px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .approve {
            background-color: #4caf50;
            color: white;
        }

        .approve:hover {
            background-color: #45a049;
        }

        .reject {
            background-color: #f44336;
            color: white;
        }

        .reject:hover {
            background-color: #e53935;
        }

        .add-date {
            font-size: 12px;
            color: #888;
        }
    </style>
<body>
<main>
    <h1>Объявления на модерацию</h1>

    <div class="add">
        <div class="add-title">Пример объявления</div>
        <div class="add-content">Это текст объявления, отправленного пользователем. Администратор может одобрить или отклонить публикацию.</div>
        <div class="add-tags">
            <span class="tag">#Пример</span>
            <span class="tag">#Объявление</span>
        </div>
        <div class="add-footer">
            <span class="add-date">Добавлено: 2024-12-17</span>
            <div>
                <button class="approve">Подтвердить</button>
                <button class="reject">Отклонить</button>
            </div>
        </div>
    </div>

</main>
</body>
</html>
</x-layout>
