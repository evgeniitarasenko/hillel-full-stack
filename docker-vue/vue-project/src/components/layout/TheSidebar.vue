<template>
    <section class="row">
        <div class="col">
            <ul class="list-group nav">
                <li class="list-group-item"><a href="#">Home</a></li>
                <li class="list-group-item"><a href="#">News</a></li>
                <li class="list-group-item"><a href="#">Feed</a></li>
                <li class="list-group-item"><a href="#">My account</a></li>
                <li class="list-group-item"><a href="#">Settings</a></li>
            </ul>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
        }
    }
}
</script>

<style>
.nav li {
    border: 0;
    border-left: 1px solid transparent;
    border-radius: 0;
}
.nav li a {
   width: 100%;
}

.nav li:hover {
    border-left: 1px solid darkcyan;
    border-radius: 0;
}
</style>