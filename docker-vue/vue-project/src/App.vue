<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <!-- TODO: Реалізуйте компонент, котрий буде приймати параметр імені у вигляді "Evgenii Tarasenko" +-->
                <!-- TODO: Всередині себе компонент повинен реалізовувати два окремих поля: name та surname +-->
                <!-- TODO: При зміні будь якого параметру - компонент повинен повертати рядок у такому ж вигляді, -->
                <!-- TODO: "Evgenii1111 Tarasenko", де спочатку буде ім'я, а потім прізвище. -->
<!--                <full-name-input :full-name="fullName" @updateFullName="(updatedFullName) => fullName = updatedFullName"/>-->
                <full-name-input
                    v-model="fullName"
                />
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                {{ fullName }}
            </div>
        </div>
    </div>
</template>

<script>
import FullNameInput from "./components/FullNameInput.vue";
import axios from 'axios';

export default {
    data() {
        return {
            fullName: 'Evgenii1 Tarasenko',
        }
    },
    components: {FullNameInput},
    created() {
        // https://api.giphy.com/v1/gifs/trending?api_key=JSnoslYjDiKWbebAPPnTnJl8YH9vW4ST

        axios.get('https://api.giphy.com/v1/gifs/trending?api_key=JSnoslYjDiKWbebAPPnTnJl8YH9vW4ST').then((response) => {
            console.log(response);
        });

        let user = {
            name: 'Test',
        }

        axios.delete('https://api...').then((response) => {
            console.log(response);
        });
    }
}
</script>


