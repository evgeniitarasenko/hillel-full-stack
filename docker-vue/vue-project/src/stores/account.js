import { defineStore } from 'pinia'
import axios from "axios";

export const useAccountStore = defineStore('account', {
    // data
    state: () => ({
        account: {
            fullName: null,
            nickname: null,
            about: null,
        },
        userId: 12,
    }),
    // computed
    getters: {

    },
    // methods
    actions: {

    },
})