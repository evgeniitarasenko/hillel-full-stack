    function show() {

}

function hide() {
    let firstModal = document.getElementById('first-modal');

    if (firstModal) {
        firstModal.classList.remove('d-block');
    }
}

a.addEventListener('click', function () {
    let firstModal = document.getElementById('first-modal');

    if (firstModal) {
        firstModal.classList.add('d-block');
        // firstModal.style.display = 'block';
    }
});