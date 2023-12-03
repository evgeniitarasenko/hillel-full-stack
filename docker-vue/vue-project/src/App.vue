<template>
    <div>
        <!-- --- 2 --- -->
        <h2>Example: 2</h2>
        <div>
            <div>Text example: {{ msg }}</div>
            <div>Text example: {{ msg.split('').reverse().join('') + '!!!' }}</div>
            <div>Text example: {{ 2 * 2 }}</div>
            <div>HTML example: {{ rawHtml }}</div>
            <div>HTML example: <span v-html="rawHtml"></span></div>
            <br>

            <div>String: {{ stringVar }}</div>
            <div>Number: {{ numberVar }}</div>
            <div>Float: {{ floatVar }}</div>
            <div>Bool: {{ boolVar }}</div>
            <div>Null: {{ nullVar }}</div>
            <div>Array: {{ arrayVar }}</div>
            <div>Object: {{ objectVar }}</div>
        </div>

        <hr>

        <!-- --- 3 --- -->
        <h2>Example: 3</h2>
        <div>
            <input :id="input.id" :class="input.classes" :type="input.type" :disabled="input.disabled">
        </div>

        <hr>

        <!-- --- 4 --- -->
        <h2>Example: 4</h2>
        <div>
            <button @click="counter = counter * 3">Click me {{ counter }}</button>
        </div>

        <hr>
    </div>
</template>

<script>
export default {
    data() {
        return {
            // --- 1 ---
            stringVar: 'Hello world',
            numberVar: 2,
            floatVar: 2.5,
            boolVar: false,
            nullVar: null,
            arrayVar: [3, 6, 9],
            objectVar: {
                name: 'Evgenii',
                surname: 'Tarasenko',
            },

            // --- 2 ---
            msg: 'Hello world',
            rawHtml: "<strong>Hello world</strong>",

            // --- 3 ---
            input: {
                id: 'custom-input-id',
                classes: {
                    'class-name-1': false,
                    'class-name-2': true,
                },
                type: 'text',
                disabled: false
            },

            // --- 4 ---
            counter: 1,
        }
    }
}
</script>


