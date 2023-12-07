<template>
    <div>
        <div class="message-box">
            <div><small>[name surname]</small></div>
            <div><strong>[text]</strong></div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            messages: [
                {
                    id: 12198353,
                    text: 'Message 1',
                    user: {
                        id: 1,
                        name: 'Evgenii',
                        surname: 'Tarasenko',
                    }
                },
                {
                    id: 12198354,
                    text: 'Message 2',
                    user: {
                        id: 2,
                        name: 'Max',
                        surname: 'Maximov'
                    }
                },
                {
                    id: 12198355,
                    text: 'Message 3',
                    user: {
                        id: 1,
                        name: 'Evgenii',
                        surname: 'Tarasenko'
                    }
                },
                {
                    id: 12198356,
                    text: 'Message 4',
                    user: {
                        id: 1,
                        name: 'Evgenii',
                        surname: 'Tarasenko'
                    }
                }
            ]
        }
    }
}
</script>

<style>
    .message-box {
        padding: 20px;
        border: 1px solid #555;
        margin-bottom: 30px;
    }
</style>