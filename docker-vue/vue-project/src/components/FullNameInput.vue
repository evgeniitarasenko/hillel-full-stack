<template>
    <div class="row">
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Name" v-model="name">
            {{ name }}
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Surname" v-model="surname">
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {

        }
    },
    props: {
        modelValue: { // 'Evgenii1 Tarasenko'
            required: true,
            type: String,
        }
    },
    methods:{

    },
    computed: {
        name: {
            get() {
                let parts = this.modelValue.split(' ');

                return parts[0];
            },
            set(value) {
                this.$emit('update:modelValue', `${value} ${this.surname}`);
            }
        },
        surname: {
            get() {
                let parts = this.modelValue.split(' ');

                return parts[1];
            },
            set(value) {
                this.$emit('update:modelValue', `${this.name} ${value}`);
            }
        }
    },
    watch: {

    },
    created() {

    }
}
</script>



