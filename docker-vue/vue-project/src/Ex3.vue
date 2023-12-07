<template>
    <div>
        <div>
            <!-- TODO: 2 - при натисканні на кнопку - відображайте тільки відповідні задачі -->
            <button type="button" @click="status='default'">Default</button>
            <button type="button" @click="status='completed'">Completed</button>
            <button type="button" @click="status='processed'">Processed</button>
        </div>

        <p>{{ message }}</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            status: 'default',
            message: '',
        };
    },
    watch: {
        // TODO напишіть вотчер для відстеження змін у status.
        // TODO при кожній зміні статусу формуйте таке повідомлення у message: "Статус змінено з [oldStatus] на [newStatus]".
    },
};
</script>

