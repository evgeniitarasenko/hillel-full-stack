<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h2>Characteristics:</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" v-for="character in characteristics" :key="character.id">
                        <character-counter
                            :character="character"
                            @changeCharacter="(character) => changeCharacter(character)"
                        />
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <pre>{{ characteristics }}</pre>
            </div>
        </div>
    </div>
</template>

<script>
import CharacterCounter from "./components/CharacterCounter.vue";

export default {
    data() {
        return {
            characteristics: [
                {
                    id: 1,
                    title: 'Health',
                    count: 0,
                },
                {
                    id: 2,
                    title: 'Strength',
                    count: 0,
                },
                {
                    id: 3,
                    title: 'Intelligence',
                    count: 0,
                },
                {
                    id: 4,
                    title: 'Endurance',
                    count: 0,
                },
                {
                    id: 5,
                    title: 'Mana',
                    count: 0,
                },
                {
                    id: 6,
                    title: 'Armor',
                    count: 0,
                },
                {
                    id: 7,
                    title: 'Speed',
                    count: 0,
                },
            ]
        }
    },
    components: {CharacterCounter},
    methods: {
        changeCharacter(character) {
            let index = this.characteristics.findIndex((item) => item.id === character.id);
            if (index !== -1) {
                this.characteristics[index] = character;
            }
        }
    }
}
</script>


