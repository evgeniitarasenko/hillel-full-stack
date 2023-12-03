<template>
    <div>
        <h2>User Profile</h2>
        <!-- Додайте кнопку, котра буде змінювати стан профілю-->
        <!-- <button>Activate | Block</button> -->

        <p>Профіль активний</p>
        <p>Профіль неактивний</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            userStatus: "active", // "inactive"
        };
    },
};
</script>