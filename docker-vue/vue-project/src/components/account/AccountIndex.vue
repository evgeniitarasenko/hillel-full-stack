<template>
    <div class="row ps-3 align-content-start" style="height: 75vh">
        <div class="col-8">
            <h2>My account</h2>
        </div>

        <div class="col-4 text-end">
            <button class="btn btn-warning btn-sm" @click="showForm = true">Edit</button>
        </div>

        <div class="col-12">
            FullName: {{ accountStore.account.fullName }}
        </div>

        <div class="col-12">
            Nickname: {{ accountStore.account.nickname }}
        </div>

        <div class="col-12">
            About: [about]
        </div>

        <div class="col-12">
            User id: {{ accountStore.userId }}
        </div>
    </div>

    <account-form v-model="showForm"/>
</template>

<script>
import AccountForm from "./AccountForm.vue";
import { mapStores } from "pinia";
import { useAccountStore } from '../../stores/account'

export default {
    data() {
        return {
            showForm: false,
        }
    },
    components: {AccountForm},
    computed: {
        ...mapStores(useAccountStore),
    },
    methods: {
    },
    created() {

    }
}
</script>