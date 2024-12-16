<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<header>
    <img src="{{ asset('images/book.png') }}" alt="Icon" class="header-icon">
    <h1>Интересные Истории</h1>
    {{$button}}
</header>

{{$slot}}

<script src="{{ asset('js/scripts.js') }}"></script>

</body>
</html>