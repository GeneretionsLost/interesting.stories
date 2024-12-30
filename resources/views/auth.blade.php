


<x-layout>
    <x-slot:title>
        Авторизация
    </x-slot:title>

    <x-slot:button>
        <a href="" class="exit-button">Выход</a>
    </x-slot:button>
    <link rel="stylesheet" href="{{ asset('css/adminStyles.css') }}">
    <style>
        main {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        form {
            align-items: center;  /* Выравнивание по горизонтали */
            justify-content: center;  /* Выравнивание по вертикали */
            width: 100%;  /* Для обеспечения того, что форма будет занимать всю ширину */
        }

        input[type="text"], input[type="password"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 95%;  /* Ширина полей ввода относительно родителя */
            max-width: 500px;  /* Максимальная ширина полей ввода */
        }


        input[type="text"]:focus, input[type="password"]:focus {
            outline: none;
            border-color: #00796b;
        }

        .submit-button{
            background-color: #00796b;
            width: 95%;
        }

        .submit-button:hover {
            background-color: #004d40; /* Темный оттенок для ховера */
        }

    </style>

    <main>
        <h2>Авторизация</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="text" name="login" value="{{ old('login') }}" placeholder="Имя пользователя" required autofocus>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit" class="submit-button">Войти</button>
        </form>
    </main>

</x-layout>