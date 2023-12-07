<template>
    <div class="app">
        <h2>База студентів</h2>

        <ul>
            <li v-for="student in students" :key="student.id">
                {{ student.name }} - {{ student.score }} балів
            </li>
        </ul>

        <p>
            Середній бал стдентів:
            <span :class="{
                'green': averageScoreDirection === 'up',
                'red': averageScoreDirection === 'down',
            }">
                {{ averageScore }}
                <span v-if="averageScoreDirection === 'up'" class="up">&uArr;</span>
                <span v-if="averageScoreDirection === 'down'" class="down">&dArr;</span>
            </span>
        </p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            students: [],
            averageScoreDirection: null,
        };
    },
    computed: {
        // Вычисляемое свойство для среднего балла студентов
        averageScore() {
            const totalScore = this.students.reduce((sum, student) => sum + student.score, 0);
            return this.students.length > 0 ? Math.round(totalScore / this.students.length) : 0;
        },
    },
    methods: {
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
            if (newScore > oldScore) {
                this.averageScoreDirection = 'up';
            } else if (newScore < oldScore) {
                this.averageScoreDirection = 'down';
            } else {
                this.averageScoreDirection = null;
            }
        },
    },
    created() {
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

.green {
    color: green;
}

.red {
    color: red;
}
</style>