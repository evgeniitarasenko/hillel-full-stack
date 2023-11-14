/*
 * Це змінна, в котрій будуть зберігатися всі туду ітеми (елементи нашого списку) у вигляді об'єктів.
 * Наприклад: [
 *    {uuid: 'asdwe42dwee2', title: 'Item 1'},
 *    {uuid: 'sd324wr235f2', title: 'Item 2'},
 * ]
 * Це звичайний масив, всередині котрого кожен елемент - це об'єкт. Просто об'єкт з 2-ма полями.
 * З самого початку цей масив пустий. Потім ми будемо його наповнювати протягом подальшого виконання коду.
 */
let todoList = [];

/*
 * =====================================================================================================================
 * Modal handling
 *
 * Далі йде два методи, котрі працюють з модальним вікном.
 * showFormModal - відкриває модальне вікно
 * hideFormModal - закриває модальне вікно
 */
function showFormModal() {
    // Щоб відкрити модальне вікно - додаємо класс до діву з модалкою
    document.getElementById('form-modal').classList.add('d-block');
}

function hideFormModal() {
    // Щоб скрити модальне вікно - прибираємо класс з діву модалки
    document.getElementById('form-modal').classList.remove('d-block');
}

/*
 * =====================================================================================================================
 * Actions
 *
 * В блоку дій ми прописуємо всі функції, які виконують певні дії: створення, редагування, видалення, зберігання, тощо.
 */
/*
 * Ця функція запускається один раз при завантаженні сторінки. Її мета - подвивитись у локальне сховище і при
 * наявності там данних туду ліста - створити відповідні елементи у html.
 */
function init() {
    // Звертаємось до локал сторейджу, отримуємо json рядок, парсимо його, щоб отримати масив ітемів.
    todoList = JSON.parse(localStorage.getItem('todo-list'));

    // Для кожного ітему викликаємо функцію createHtmlTodoItem, яка у свою чергу буде створювати html елементи.
    // У змінній item ми по черзі маємо об'єкт туду лісту, наприклад {uuid: 'asdwe42dwee2', title: 'Item 1'}
    todoList.forEach((item) => createHtmlTodoItem(item));
}

/*
 * Функція create виконує дві дії: очищує поля форми і викриває модалку з формаю.
 * Тобо підготовлює форму для створення нового
 */
function create() {
    // Для очищення uuid і title - шукаємо елемент за ідентифіктором у html і скидаємо аттрибут value у путий рядок.
    document.getElementById('form-uuid').value = '';
    document.getElementById('form-title').value = '';

    // Викликаємо функцию по відкриттю модального вікна.
    showFormModal();
}

/*
 * Функція edit заповнює форму інснуючим туду ітемом і вікриває модалку з формою.
 */
function edit(uuid) {
    // Шукаємо інуючий тайтл за індентифікатором у html і забираємо вкладений текст.
    // Як результат отримуємо значення (текст) тайтлу для редагування
    const title = document.getElementById(`title-${uuid}`).innerText;

    // Заповнюємо поля у формі данними існуючого елемента, який ми зараз редагуємо.
    // Для заповнення значення поля: знаходимо його у html та змінюємо атрибут value
    document.getElementById('form-title').value = title;
    document.getElementById('form-uuid').value = uuid;
    // Викликаємо функцию по відкриттю модального вікна.
    showFormModal();
}

/*
 * Функція видалення елементу з html
 */
function remove(uuid) {
    // Спочатку питаємо чи дійсно користувач бажає видалити.
    const decision = confirm('Are you sure?');
    if (decision) {
        // Якщо так - шукаємо ітем за ідентифікатором і видаляємо його з html.
        document.getElementById(`item-${uuid}`).remove();
    }
}

/*
 * Функція для зберігання данних. Під зберігання ми розуміємо додавання або редагування.
 * Парметр data - це об'єкт у вигляді {uuid: 'asdwe42dwee2', title: 'Item 1'}. Данні, котрі потрібно зберегти.
 * Якщо нам потрібно додати новий елемент, то uuid буде путим {uuid: '', title: 'Item 1'}
 * Якщо нам потрібно редагувати існуючий елемент, то uuid буде заповненим {uuid: 'asdwe42dwee2', title: 'Item 1'}
 */
function save(data) {
    // Якщо у нашому об'єкту data немає uuid (тобто нам потрібно його створити) - генеруємо новий.
    if (!data.uuid) {
        data.uuid = generateUuid();
    }

    /*
     * Шукаемо індекс інсуючуго об'єкту в масиві todoList за uuid.
     * У item ми будемо по черзі мати кожен з елементів todoList. А ми пам'ятаємо, що елемент todoList - це об'єкти.
     * Ми порівнюємо uuid у об'єкті масиву todoList з тим uuid, котрий ми маємо у data
     * Якщо uuid співпадає - повертаємо індекс знайденого елементу у масиві todoList.
     * Якщо нічого не знайденмо - findIndex поверне -1
     */
    let index = todoList.findIndex((item) => item.uuid === data.uuid);
    if (index === -1) { // Якщо не знайшли жодного об'єкту у масиві за uuid (тобто ми створюємо новий елемент)
        // Додаємо новий елемент у масив
        todoList.push(data);
        // Створюємо новий html елемент
        createHtmlTodoItem(data);
    } else { // У протилежному випадку (якщо знайшли елемент у масиві) (якщо елемент існує і потрібно його редагувати)
        // Редагуємо елемент у масиві за індексом
        todoList[index] = data;
        // Редагуємо елемент у html
        editHtmlTodoItem(data);
    }

    /*
     * У todoList зберігається вся інформація про всі туду ліст після додавання чи редагування.
     * Перетворюємо масив у рядок і оновлюємо локал сторейдж новим станом todoList
     */
    localStorage.setItem('todo-list', JSON.stringify(todoList));
}

/*
 * Функція, яка приймає об'єкт data ({uuid: 'asdwe42dwee2', title: 'Item 1'})
 * і на основі нього створює новий елемент у html
 */
function createHtmlTodoItem(data) {
    // Створюємо li
    let liElement = document.createElement('li');
    // Задаємо значення атрибута id для li
    liElement.id = `item-${data.uuid}`;
    // Задаємо наповнення li. Вжливо, у внутрішній html ми підставляемо тайтл і uuid там, де це потрібно
    // id="title-${data.uuid}" - використовується для пошуку блоку тайтлу за uuid
    // data-uuid="${data.uuid}" - використовуємться у лістенері для отримання uuid
    liElement.innerHTML = `
        <div id="title-${data.uuid}">${data.title}</div>
        <div>
            <button data-uuid="${data.uuid}" class="btn btn-warning btn-sm edit-button">Edit</button>
            <button data-uuid="${data.uuid}" class="btn btn-danger btn-sm remove-button">Remove</button>
        </div>`;
    // Додаємо класи у li просто для зовнішнього вигляду
    liElement.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');

    // Шукаємо всередині лі елмент з класом edit-button і додаємо лістенер на подію клік
    liElement.querySelector('.edit-button').addEventListener('click', function (event) {
        // Коли відпрацьовує клік - викликаємо функцію edit. Передаємо uuid, котрий забираємо з атрибута data-uuid кнопки
        edit(event.target.dataset.uuid);
    });

    // Шукаємо всередині лі елмент з класом remove-button і додаємо лістенер на подію клік
    liElement.querySelector('.remove-button').addEventListener('click', function (event ) {
        // Коли відпрацьовує клік - викликаємо функцію remove. Передаємо uuid, котрий забираємо з атрибута data-uuid кнопки
        remove(event.target.dataset.uuid);
    });

    // Додаємо новий лі у html
    document.getElementById('todo-list').appendChild(liElement);
}

/*
 * Функція, яка редагуж данні у html згідно з об'єктом data ({uuid: 'asdwe42dwee2', title: 'Item 1'})
 */
function editHtmlTodoItem(data) {
    // Шукаємо лі, котрий має відповідний атрибут id
    const editedLi = document.getElementById(`item-${data.uuid}`);
    if (editedLi) {
        // Якщо знайшли - змінюємо тайл новим значенням
        editedLi.querySelector(`#title-${data.uuid}`).innerText = data.title;
    }
}

/*
 * =====================================================================================================================
 * Listeners
 *
 * Блок, який визначає лістенери у нашому проєкті.
 */
// Додаємо лістенер на подію відправки форми.
document.getElementById('form').addEventListener('submit', function (event) {
    // Попереджаємо дефолтну поведінку форми (відправку данних і перезавантаження сторінки)
    event.preventDefault();

    // Забираємо значення title і uuid з форми. Шукаємо елемент по id і забираємо значення атрибуту value
    const title = document.getElementById('form-title').value;
    const uuid = document.getElementById('form-uuid').value;

    // Формуємо об'єкт туду ітему. Цей об'єкт складається з тайтул і ююід ({uuid: 'asdwe42dwee2', title: 'Item 1'})
    // У випадку редагування поле uuid буде мати значення вже існуючого uuid (див. edit())
    const data = {
        uuid,
        title,
    };

    // Пробуємо валідувати форму. Валідація - це первіка правильності завповнення.
    if (validateForm(data)) {
        // Якщо все заповленно вірно - зберігаємо ітем (створюємо, якщо не існує, або редагуємо, якщо існує)
        save(data);
        // Скриваємо модальне вікно
        hideFormModal();
    }
});

/*
 * =====================================================================================================================
 * Validating
 */
function validateForm(data) {
    // Ощичаємо всі помилки
    clearErrors();

    // Задаємо дефолтне значення рішення валідацію. Ще кажуть, що створюємо "прапор".
    let decision = true;

    // Якщо немає тайтлу - це невірне заповнення форми. валідація не проходить.
    if (!data.title) {
        // Заповнюємо текст помилки
        document.getElementById('form-title-invalid-feedback').innerText = 'Title field is required.';
        // Додаємо класс, для відображення помилки (див. Bootstrap documentation)
        document.getElementById('form-title').classList.add('is-invalid');

        // Змінюємо прапор рішення валідації на негативне значення.
        decision = false;
    }

    // Повертаємо рішення true або false
    return decision;
}

/*
 * Очищуємо всі помилки у формі. Для того, щоб вони не відображались - можна просто прибрати класс is-invalid
 * з кожного поля форми.
 */
function clearErrors() {
    document.getElementById('form-title').classList.remove('is-invalid');
}

/*
 * =====================================================================================================================
 * Other
 */
/*
 * Функция для генерації рандомного рядка. цей рядок буде використовуватись в якості uuid.
 */
function generateUuid() {
    return Math.random().toString(16).slice(2);
}

// При завантаженні сторінки запускаємо функцію init, яка прочитає значення зі сховища та ствоить туду ітеми,
// які там зберігаються. Зверніть увагу, що ця функція запускається лише один раз тут.
init();