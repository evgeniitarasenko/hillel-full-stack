<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            id="inputEmail4"
                            v-model="user.email"
                        >
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Address...">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">City</label>
                        <input type="text" class="form-control" id="inputCity" placeholder="City...">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Area</label>
                        <select id="inputState" class="form-select">
                            <option value=" 1 ">Харків</option>
                            <option value="2">Чугуїв</option>
                            <option value="3">Краматорськ</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">Index</label>
                        <input type="text" class="form-control" id="inputZip" v-model.trim="user.index">
                    </div>
                    <div class="col-md-12">
                        <label for="about" class="form-label">About</label>
                        <textarea v-model.trim="user.about" id="about" placeholder="About" class="form-control"></textarea>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="termsCheck">
                            <label class="form-check-label" for="termsCheck">
                                Terms and Conditions
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </form>

                <pre class="mt-4">{{ user }}</pre>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: {
                email: null,
                password: null,
                address: null,
                city: null,
                area: null,
                index: null,
                about: null,
                terms: null,
            }
        }
    },
    methods: {

    },
    computed: {

    },
    created() {
        this.user.email = 'test@test.com';
    }
}
</script>


