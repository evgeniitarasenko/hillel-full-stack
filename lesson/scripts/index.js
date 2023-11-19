const config = {
    giphy: {
        api_key: 'JSnoslYjDiKWbebAPPnTnJl8YH9vW4ST',
        url: 'https://api.giphy.com/v1/gifs',
    }
};


function fetchTrending() {
    document.getElementById('box-gallery').innerHTML = '';

    fetch( `${config.giphy.url}/trending?api_key=${config.giphy.api_key}`)
        .then((response) => response.json())
        .then((list) => {
            list.data.forEach((item) => {
                createHtmlGalleryItem(item);
            })
        });
}

function fetchSearch(query) {
    document.getElementById('box-gallery').innerHTML = '';

    // https://api.giphy.com/v1/gifs/search?q=fire&api_key=JSnoslYjDiKWbebAPPnTnJl8YH9vW4ST

    fetch( `${config.giphy.url}/search?q=${encodeURIComponent(query)}&api_key=${config.giphy.api_key}`)
        .then((response) => response.json())
        .then((list) => {
            list.data.forEach((item) => {
                createHtmlGalleryItem(item);
            })
        });
}


function createHtmlGalleryItem(item) {
    let div = document.createElement('div');
    div.id = `gallery-item-${item.id}`;
    div.classList.add('col-auto', 'my-2', 'img-thumbnail');
    div.innerHTML = `<img src="${item.images.fixed_height.url}" alt="${item.title}" loading="lazy">`;

    document.getElementById('box-gallery').append(div)
}


window.addEventListener('load', function (event) {
    fetchTrending();
})

document.getElementById('search').addEventListener('blur', function (event) {
    const query = event.target.value;

    fetchSearch(query)
})