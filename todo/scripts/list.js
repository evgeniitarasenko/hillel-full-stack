// /*
//  * Modal handling
//  */
// function showFormModal() {
//     document.getElementById('form-modal').classList.add('d-block');
// }
//
// function hideFormModal() {
//     document.getElementById('form-modal').classList.remove('d-block');
// }
//
// /*
//  * Actions
//  */
// function init() {
//     const list = getToDoList();
//
//     list.forEach((item) => createToDoHtmlItem(item));
// }
//
// function create() {
//     document.getElementById('form-uuid').value = '';
//     document.getElementById('form-title').value = '';
//
//     showFormModal();
// }
//
// function edit(uuid) {
//     const title = document.getElementById(`title-${uuid}`).innerText;
//
//     document.getElementById('form-title').value = title;
//     document.getElementById('form-uuid').value = uuid;
//     showFormModal();
// }
//
// function remove(uuid) {
//     const decision = confirm('Are you sure?');
//     if (decision) {
//         document.getElementById(`item-${uuid}`).remove();
//     }
// }
//
// function save(data) {
//     if (!data.uuid) {
//         data.uuid = generateUuid();
//     }
//
//     let list = getToDoList();
//     const editableItemIndex = list.findIndex((item) => item.uuid === data.uuid);
//
//     if (editableItemIndex !== -1) {
//         list[editableItemIndex] = data;
//         updateToDoHtmlItem(data);
//     } else {
//         list.push(data);
//         createToDoHtmlItem(data);
//     }
//
//     setToDoList(list);
// }
//
// function createToDoHtmlItem(data) {
//     let liElement = document.createElement('li');
//     liElement.id = `item-${data.uuid}`;
//     liElement.innerHTML = `
//         <div id="title-${data.uuid}">${data.title}</div>
//         <div>
//             <button data-uuid="${data.uuid}" class="btn btn-warning btn-sm edit-button">Edit</button>
//             <button data-uuid="${data.uuid}" class="btn btn-danger btn-sm remove-button">Remove</button>
//         </div>`;
//     liElement.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');
//
//     liElement.querySelector('.edit-button').addEventListener('click', function (event) {
//         edit(event.target.dataset.uuid);
//     });
//
//     liElement.querySelector('.remove-button').addEventListener('click', function (event ) {
//         remove(event.target.dataset.uuid);
//     });
//
//     document.getElementById('todo-list').appendChild(liElement);
// }
//
// function updateToDoHtmlItem(data) {
//     const editedLi = document.getElementById(`item-${data.uuid}`);
//
//     if (editedLi) {
//         editedLi.querySelector(`#title-${data.uuid}`).innerText = data.title;
//     }
// }
//
// /*
//  * Listeners
//  */
// document.getElementById('form').addEventListener('submit', function (event) {
//     event.preventDefault();
//
//     const title = document.getElementById('form-title').value;
//     const uuid = document.getElementById('form-uuid').value;
//
//     const data = {
//         uuid,
//         title,
//     };
//
//     if (validateForm(data)) {
//         save(data);
//         hideFormModal();
//     }
// });
//
// window.addEventListener('load', function () {
//     init();
// })
//
// /*
//  * Validation
//  */
// function validateForm(data) {
//     clearErrors();
//
//     let decision = true;
//
//     if (!data.title) {
//         document.getElementById('form-title-invalid-feedback').innerText = 'Title field is required.';
//         document.getElementById('form-title').classList.add('is-invalid');
//
//         decision = false;
//     }
//
//     return decision;
// }
//
// function clearErrors() {
//     document.getElementById('form-title').classList.remove('is-invalid');
// }
//
// /*
//  * Local storage
//  */
// function getToDoList() {
//     const list = localStorage.getItem('todo-list');
//
//     return list ? JSON.parse(list) : [];
// }
//
// function setToDoList(list) {
//     localStorage.setItem('todo-list', JSON.stringify(list));
// }
//
// /*
//  * Other
//  */
// function generateUuid() {
//     return Math.random().toString(16).slice(2);
// }