<template>
    <div id=""> <!-- Add user id as "user-12752987292" -->
        <div>Name: ***</div> <!-- Replace *** -->
        <div>Surname: ***</div> <!-- Replace *** -->
        <div>Age: ***</div> <!-- Replace *** -->
        <div>About: ***</div> <!-- Replace *** -->
        <div><a href="">Linkedin</a></div> <!-- Add linkedin url to href -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: {
                id: 12752987292,
                name: 'Evgenii',
                surname: 'Tarasenko',
                age: 27,
                linkedin: 'https://www.linkedin.com/in/evgeniitarasenko/',
                about: '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</br> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            }
        }
    }
}
</script>