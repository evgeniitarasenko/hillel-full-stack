<template>
    <div>
        <h2>Flex playground</h2>

        <div>
            <h3>justify-content</h3>
            <div>
                <button>start</button>
                <button>center</button>
                <button>space-between</button>
                <button>space-around</button>
            </div>
        </div>

        <div>
            <h3>align-items</h3>
            <div>
                <button>stretch</button>
                <button>center</button>
                <button>start</button>
                <button>end</button>
            </div>
        </div>

        <div>
            <button>Show code</button>
            <div>
                <!-- TODO: Виведіть актуальний код стилів .flex-box тут (див відео) -->
                <!-- TODO: За замовчуваням цей блок скритий. Відкривається тільки по кліку Show code -->
                <!-- TODO: Коли блок відкритий - замініть текст кнопки Show code на Hide code, котра буде скривати блок з кодом -->
            </div>
        </div>

        <div class="flex-box">
            <div class="flex-item">One</div>
            <div class="flex-item">Two</div>
            <div class="flex-item">Tree</div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {};
    },
};
</script>

<style>
.flex-box {
    display: flex;
    width: 600px;
    height: 300px;
    border: 1px solid #000000;
}

.flex-item {
    width: 100px;
    height: 50px;
    background-color: aqua;
}

</style>