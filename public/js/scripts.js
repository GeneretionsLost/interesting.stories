document.querySelectorAll('.story-content').forEach(function (storyContent) {
    const text = storyContent.innerText.trim();
    const words = text.split(' ');
    const truncatedText = words.slice(0, 100).join(' ') + '...';
    storyContent.innerHTML = truncatedText + ' <a href="#" class="continue-link">далее</a>';
});
