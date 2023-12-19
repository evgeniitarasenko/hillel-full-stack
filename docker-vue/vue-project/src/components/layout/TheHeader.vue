<template>
    <section class="row justify-content-between align-items-center">
        <div class="col-auto"><a href="#">Logo</a></div>
        <div class="col-auto d-flex align-items-center">
            <div class="d-inline-block avatar"></div>
            <div class="d-inline-block nickname"><a href="#">{{ account.nickname }}</a></div>
        </div>
    </section>
</template>

<script>
import { mapState } from "pinia";
import { useAccountStore } from '../../stores/account'

export default {
    data() {
        return {
        }
    },
    computed: {
        ...mapState(useAccountStore, ['account'])
    }
}
</script>

<style scoped>
.avatar {
    height: 20px;
    width: 20px;
    border-radius: 10px;
    background-color: darkcyan;
    margin-right: 10px;
}


</style>