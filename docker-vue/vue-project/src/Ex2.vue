<!-- App.vue -->
<template>
    <div>
        <h2>Task list</h2>

        <div>
            <!-- TODO: 2 - при натисканні на кнопку - відображайте тільки відповідні задачі -->
            <button type="button" @click="filter='all'">All</button>
            <button type="button" @click="filter='completed'">Completed</button>
            <button type="button" @click="filter='processed'">Processed</button>
        </div>

        <ul>
            <!-- TODO: 1. відобразіть список задач -->
            <li v-for="task in filteredTasks" :key="task.id">
                [task text] - [якщо виконано - 'Completed', якщо ні - 'Active']
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tasks: [
                {id: 1, text: 'Buy products', completed: false},
                {id: 2, text: 'Read the book', completed: true},
                {id: 3, text: 'Write code', completed: false},
            ],
            filter: 'all',
        };
    },
    computed: {
        filteredTasks() {
            // TODO: 2. на основі змінної filter відфільтруйте массив tasks

            return this.tasks;
        },
    },
};
</script>

<style>
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
}

ul {
    margin-top: 20px;
}
</style>