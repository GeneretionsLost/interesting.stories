document.querySelectorAll('.story-content').forEach(function (storyContent) {
    const text = storyContent.innerText.trim();
    const words = text.split(' ');

    // Проверяем, есть ли в тексте меньше 100 слов
    if (words.length <= 100) {
        return; // Ничего не делаем
    }

    const truncatedText = words.slice(0, 100).join(' ') + '...';
    storyContent.innerHTML = truncatedText + ' <a href="#" class="continue-link">далее</a>';

    // Находим ссылку на заголовке истории
    const storyTitleLink = storyContent.closest('.story, .awaiting-story').querySelector('.story-title');


    // Обработчик клика на "далее"
    const continueLink = storyContent.querySelector('.continue-link');
    continueLink.addEventListener('click', function (e) {
        e.preventDefault(); // Предотвращаем стандартное поведение

        // Переходим по ссылке заголовка
        window.location.href = storyTitleLink.href;
    });
});
