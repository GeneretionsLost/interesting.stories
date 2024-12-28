<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        .alert-container {
            display: flex;
            justify-content: flex-end; /* Выравнивание по правому краю */
            margin: 20px; /* Отступы вокруг */
        }

        .alert {
            max-width: 400px; /* Ограничиваем ширину */
        }
    </style>

</head>
<body>

<header>
    <a href="{{ route('index') }}">
        <img src="{{ asset('images/book.png') }}" alt="Icon" class="header-icon">
        <h1>Интересные Истории</h1>
    </a>
    {{$button}}
</header>

{{$slot}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>