<template>
    <div class="app">
        <h2>База студентів</h2>

        <ul>
            <li> <!-- TODO: реалізуйте відображення списку студентів тут через v-for -->
                [ student name ] - [ student.score ] балів
            </li>
        </ul>

        <p>
            Середній бал стдентів:
            <span> <!-- TODO: Змінюйте колір тексту, якщо середній бал збільшується - зелений, якщо ні - червоний -->
                {{ averageScore }} <!-- TODO: це обчислювальна властивість. Релізуйте код розрахунку у computed секції -->
                <span class="up">&uArr;</span> <!-- TODO: Стрілка вгору. виводьте її коли середній бал збільшується -->
                <span class="down">&dArr;</span><!-- TODO: Стрілка вниз. виводьте її коли середній бал зменшується -->
            </span>
        </p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            students: [],
        };
    },
    computed: {
        averageScore() {
            // TODO: Реалізуйте розрахунок середнього балу всіх студентів.
            return 0;
        },
    },
    methods: {
        /*
         * Функція генерації нового студента. Тут змін не потрібно.
         */
        generateStudent() {
            let nameList = [
                'Time','Past','Future','Dev', 'Fly','Flying','Soar','Soaring','Power','Falling', 'Fall','Jump','Cliff',
                'Mountain','Rend','Red','Blue', 'Green','Yellow','Gold','Demon','Demonic','Panda','Cat', 'Kitty','Kitten',
                'Zero','Memory','Trooper','Bandit', 'Fear','Light','Glow','Tread','Deep','Deeper','Deepest', 'Mine','Your',
            ];

            return {
                id: (new Date()).getTime(),
                name: nameList[Math.floor( Math.random() * nameList.length )],
                score: Math.floor( Math.random() * 100)
            };
        },
    },
    watch: {
        averageScore(newScore, oldScore) {
            // Метод для слудкування за середнім балом. Може бути у нагоді)
        },
    },
    created() {
        /*
         * Це допоможе додавати нового студента у список кожні 5 секунд. Зміни не потрібні.
         * Уявимо, що ми не просто генеруємо рандомних студентів, а отримуємо результати по API з сервера.
         */
        setInterval(() => {
            this.students.push(this.generateStudent());
        }, 5000)
    }
};
</script>

<style>
.app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin-bottom: 10px;
}

button {
    padding: 8px;
    font-size: 16px;
}

// Класи, які мають лише одну властивість: колір. Також може бути у нагоді.
.green {
    color: green;
}

.red {
    color: red;
}
</style>