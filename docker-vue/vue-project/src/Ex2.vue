<template>
    <div>
        <!-- Відобразіть блок #card при натисканні на кнопку (зверніть увагу на класс .visible та змінну isVisible) -->
        <!-- Додатково: якщо блок #card відображено - змініть текст кнопки на "Hide block below" -->
        <div>
            <button>Show block below</button>
        </div>


        <section>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
            Aldus PageMaker including versions of Lorem Ipsum.
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isVisible: false,
        }
    }
}
</script>

<style>
.visible {
    display: block !important;
}

section {
    display: none;

    margin-top: 20px;
    border: 1px solid #000;
    padding: 20px;
}

</style>