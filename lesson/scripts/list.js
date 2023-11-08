function add() {
    let text = prompt('Add item');

    let liElement = document.createElement('li');
    liElement.innerText = text;
    liElement.classList.add('list-group-item');

    document.getElementById('todo-list').appendChild(liElement);
}