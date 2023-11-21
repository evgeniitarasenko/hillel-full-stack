let server = {
    url: 'https://crudapi.co.uk/api/v1/todo-list',
    token: 'Gh8cwSj1Wo6tJEp7s8YFhIaYV7Po1jMSLBRiHdop0thnZQ_OFQ',

    /*
     * Отримання списку записів з серверу
     */
    list() {
        return fetch(this.url, {
            method: 'get',
            headers: new Headers({
                'Authorization': `Bearer ${this.token}`,
                'Content-Type': 'application/json'
            }),
        }).then((response) => {
                return response.json()
            });
    },

    /*
    * Запис нового завдання на сервер.
    */
    store(task) {
        return fetch(this.url, {
            method: 'post',
            headers: new Headers({
                'Authorization': `Bearer ${this.token}`,
                'Content-Type': 'application/json',
            }),
            body: JSON.stringify([task])
        }).then((response) => response.json());
    },
    /*
     * Оновлення запису на сервері по uuid
     */
    update(uuid, task) {
        return fetch(`${this.url}/${uuid}`, {
            method: 'put',
            headers: new Headers({
                'Authorization': `Bearer ${this.token}`,
                'Content-Type': 'application/json'
            }),
            body: JSON.stringify(task)
        }).then((response) => response.json());
    },

    /*
     * Видалення запису з серверу
     */
    remove(uuid) {
        return fetch(`${this.url}/${uuid}`, {
            method: 'delete',
            headers: new Headers({
                'Authorization': `Bearer ${this.token}`,
                'Content-Type': 'application/json'
            }),
        }).then((response) => response.json());
    },
};


