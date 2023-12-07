<template>
    <div>
        <div>
            <h2>v-for</h2>

            <h5>Names</h5>
            <!-- arrayOfNames: ['Name1', 'Name2', 'Name3', ], -->
            <ul>
                <li v-for="name in arrayOfNames"><strong>{{ name }}</strong></li>
                <li v-for="(name, index) in arrayOfNames">{{ index }}: <strong>{{ name }}</strong></li>
            </ul>

            <h2>Users</h2>
            <ul>
                <li
                    v-for="user in arrayOfObjects"
                    :key="user.id"
                >{{ user.name }}</li>
            </ul>

            <hr>
        </div>

        <div>
            <button type="button" @click="sayHi">Hi</button>
        </div>

        <div>
            <!-- Computed -->
            <!-- Якщо вік менше 18 - виводити "Дитина", якщо вік більше 65: "літня людина", у іншому разі "дорослий" -->
            <h2>Computed</h2>
            <div>{{ age }}: {{ humanAge }}</div>

            <hr>
        </div>

        <div>
            <h2>Watchers</h2>
            <div>
                <input type="text" v-model="text" placeholder="text">
                <div>{{ text }}</div>
                <div v-show="isWin" style="color: green;">
                    <small>The sentence "{{ text }}" includes word {{ word }}. You are win</small>
                </div>
            </div>
            <hr>
        </div>

        <div>
            <h2>Deep watcher</h2>
            <input type="text" v-model="user.name" placeholder="user name">
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            // v-for
            arrayOfNames: ['Name1', 'Name2', 'Name3', {test: ''}],
            arrayOfObjects: [
                {id: 1, name: 'Name user 1'},
                {id: 2, name: 'Name user 2'},
                {id: 3, name: 'Name user 3'},
            ],

            // Computed
            age: 21,

            // watchers
            word: 'hillel',
            text: null,
            isWin: false,

            user: {
                id: 1,
                name: 'Yevhen',
                surname: 'Tarasenko',
            },
        }
    },
    methods: {
        getHumanAge() {
            if (this.age < 18) {
                return 'дитина';
            } else if (this.age > 65) {
                return 'літня людина';
            } else {
                return 'дорослий';
            }
        }
    },
    computed: {
        humanAge() {
            if (this.age < 18) {
                return 'дитина';
            } else if (this.age > 65) {
                return 'літня людина';
            } else {
                return 'дорослий';
            }
        }
    },
    watch: {
        text(newText, oldText) {
            this.isWin = this.text.includes(this.word);
        }
    }
}
</script>


