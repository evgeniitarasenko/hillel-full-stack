handleUser({
    name: 'name1',
    showName: function () {
        alert(this.name);
    }
});


function handleUser(u) {
    u.showName();
}