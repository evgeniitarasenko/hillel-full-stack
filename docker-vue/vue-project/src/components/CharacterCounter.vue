<template>
    <div>
        <div class="d-inline-block me-3">{{ character.title }}:</div>
        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-outline-primary">-</button>
            <button type="button" class="btn btn-primary" readonly="">{{ count }}</button>
            <button type="button" class="btn btn-outline-primary" @click="add">+</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            count: 0
        }
    },
    props: {
        // {id: 1, title: 'test', count: 0}
        character: {
            required: true,
            type: Object,
        }
    },
    methods: {
        add() {
            this.count++;

            let updateCharacter = {...this.character};
            updateCharacter.count = this.count;

            this.$emit('changeCharacter', updateCharacter);
        }
    }
}
</script>



