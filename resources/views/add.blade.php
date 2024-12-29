<x-layout>
    <x-slot:title>
        Новая история
    </x-slot:title>

    <x-slot:button>
        <a href="{{ route('index') }}" class="add-button">Назад</a>
    </x-slot:button>
    <main>

        <section id="add-story">
            <h2>Добавить Историю</h2>
            <form method="POST" action="{{ route('store') }}">
                @csrf
                <input type="text" name="title" placeholder="Название истории" required>
                <textarea name="content" rows="5" placeholder="Текст истории" required></textarea>
                <input type="text" name="tags" placeholder="Введите метки через запятую (например: #метка1, #метка2)">
                <button type="submit" class="submit-button">Добавить</button>
            </form>
        </section>


    </main>
</x-layout>

