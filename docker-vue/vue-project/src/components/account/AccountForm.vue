<template>
    <div class="modal" :class="{'d-block': visible}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Account form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="visible = false"></button>
                </div>

                <div class="modal-body">
                    <div class="row pb-2">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Full name" v-model="account.fullName">
                        </div>
                    </div>

                    <div class="row pb-2">
                        <div class="col">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Nickname"
                                aria-label="Nickname"
                                v-model="account.nickname"
                            >
                        </div>
                    </div>

                    <div class="row pb-2">
                        <div class="col">
                            <textarea class="form-control" placeholder="About" aria-label="About"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="visible = false">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from "pinia";
import { useAccountStore } from '../../stores/account'

export default {
    data() {
        return {

        }
    },
    props: {
        modelValue: {
            readable: true,
            type: Boolean,
        }
    },
    computed: {
        ...mapState(useAccountStore, ['account']),
        visible: {
            get() {
                return this.modelValue;
            },
            set(value) {
                this.$emit('update:modelValue', value);
            }
        }
    }
}
</script>