/*
 * Modal processing
 */
function showFormModal() {
    document.getElementById('form-modal').classList.add('d-block');
}

function hideFormModal() {
    document.getElementById('form-modal').classList.remove('d-block');
}

/*
 * Actions
 */
function create () {
    // Clear existing input value
    document.getElementById('form-title').value = '';
    document.getElementById('form-uuid').value = '';
    clearValidationErrors();
    showFormModal();
}

function edit(uuid) {
    const title = document.getElementById(`item-${uuid}`).querySelector('.title').innerText;
    document.getElementById('form-title').value = title;
    document.getElementById('form-uuid').value = uuid;

    clearValidationErrors();
    showFormModal();
}

function remove(uuid) {
    // TODO: confirmation

    document.getElementById(`item-${uuid}`).remove();
}

function save(data) {
    const uuid = data.uuid ? data.uuid : generateUuid();

    // Updating
    const editedLi = document.getElementById(`item-${uuid}`);
    if (editedLi) {
        editedLi.querySelector('.title').innerText = data.title;

        return;
    }

    // Storing
    let liElement = document.createElement('li');
    liElement.id = `item-${uuid}`;
    liElement.innerHTML = `
        <div class="title">${data.title}</div>
        <div>
            <button data-uuid="${uuid}" type="button" class="btn btn-warning btn-sm edit-button">Edit</button>
            <button data-uuid="${uuid}" type="button" class="btn btn-danger btn-sm remove-button">Remove</button>
        </div>`;
    liElement.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');

    liElement.querySelector('.edit-button').addEventListener('click', function (event) {
        edit(event.target.dataset.uuid);
    });

    liElement.querySelector('.remove-button').addEventListener('click', function (event) {
       remove(event.target.dataset.uuid);
    });

    document.getElementById('todo-list').appendChild(liElement);
}

/*
 * Listeners
 */
document.getElementById("saving-form").addEventListener("submit", function (event) {
    event.preventDefault();

    const uuid = document.getElementById('form-uuid').value;
    const title = document.getElementById('form-title').value;

    const data = {
        uuid,
        title,
    }

    if (validate(data)) {
        save(data);
        hideFormModal();
    }
});

function validate(data) {
    clearValidationErrors();

    let decision = true;

    if (!data.title) {
        document.getElementById('form-title-invalid-feedback').innerText = 'Title field is required.'
        document.getElementById('form-title').classList.add('is-invalid');

        decision = false;
    }

    return decision;
}

function clearValidationErrors () {
    document.getElementById('form-title').classList.remove('is-invalid');
}

/*
 * Other
 */
function generateUuid() {
    return Math.random().toString(16).slice(2);
}
