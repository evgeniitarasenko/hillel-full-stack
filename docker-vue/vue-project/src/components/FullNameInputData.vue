<template>
    <div class="row">
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Name" v-model="name">
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
            name: null,
            surname: null,
        }
    },
    props: {
        modelValue: {
            required: true,
            type: String,
        }
    },
    methods:{
        fire() {
            this.$emit('update:modelValue', `${this.name} ${this.surname}`);
        }
    },
    watch: {
        name() {
            this.fire();
        },
        surname() {
            this.fire();
        }
    },
    created() {
        let parts = this.modelValue.split(' ');

        this.name = parts[0];
        this.surname = parts[1];
    }
}
</script>



