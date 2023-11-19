/*
 * Configuration
 */
function config() {
    return {
        giphy: {
            api_key: 'JSnoslYjDiKWbebAPPnTnJl8YH9vW4ST',
            url: 'https://api.giphy.com/v1'
        }
    }
}

/*
 * API
 */
function fetchTrending() {
    const giphy = config().giphy;

    fetch(`${giphy.url}/gifs/trending?api_key=${giphy.api_key}`)
        .then((response) => response.json())
        .then((list) => updateGallery(list.data));
}

function fetchSearch(query) {
    const giphy = config().giphy;

    console.log('Some code before')

    fetch(`${giphy.url}/gifs/search?q=${encodeURIComponent(query)}&api_key=${giphy.api_key}`)
        .then((response) => response.json())
        .then((list) => updateGallery(list.data));

    console.log('Some code after')
}

/*
 * Actions
 */
function updateGallery(list) {
    document.getElementById('box-gallery').innerHTML = '';
    list.forEach((item) => createHtmlItem(item));
}

/*
 * DOM handling
 */
function createHtmlItem(item) {
    let div = document.createElement('div');
    div.id = `gallery-item-${item.id}`;
    div.classList.add('col-auto', 'my-2', 'img-thumbnail');
    div.innerHTML = `<img src="${item.images.fixed_height.url}" alt="${item.title}" loading="lazy">`;

    document.getElementById('box-gallery').append(div)
}

/*
 * Listeners
 */
window.addEventListener('load', function (event) {
    fetchTrending();
});

document.getElementById('search').addEventListener('blur', function (event) {
    const query = event.target.value.trim();

    if (query && query.length >= 3) {
        fetchSearch(query);
    }
});

document.getElementById('search').addEventListener('keypress', function (event) {
    const query = event.target.value.trim();

    if (event.code === 'Enter' && query && query.length >= 3) {
        fetchSearch(query);
    }
});

