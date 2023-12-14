<template>
    <div>
        <div class="d-inline-block me-3">{{ character.title }}:</div>
        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
            <button
                type="button"
                class="btn btn-outline-primary"
                @click="count--; fire()"
                :disabled="!count"
            >-</button>

            <button type="button" class="btn btn-primary" readonly="">{{ count }}</button>

            <button
                type="button"
                class="btn btn-outline-primary"
                @click="count++; fire()"
                :disabled="!isActive"
            >+</button>
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
        character: {
            required: true,
            type: Object,
        },
        isActive: {
            required: false,
            type: Boolean,
            default: () => true,
        }
    },
    methods: {
        fire() {
            let updateCharacter = {...this.character};
            updateCharacter.count = this.count;

            this.$emit('changeCharacter', updateCharacter);
        }
    }
}
</script>



