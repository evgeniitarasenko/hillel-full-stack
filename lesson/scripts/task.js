/*
 * Виведіть повідомлення у консоль в форматі:
 * "[user_nickname] -- [date]
 *
 * [message]"
 */
let messages = [
    {
        id: 1,
        user: {
            id: 1,
            nickname: 'User 1',
        },
        text: 'Message 1',
        date: '2023-11-02 11:00:01',
    },
    {
        id: 2,
        user: {
            id: 2,
            nickname: 'User 2',
        },
        text: 'Message 2',
        date: '2023-11-02 11:01:11',
    },
    {
        id: 3,
        user: {
            id: 1,
            nickname: 'User 1',
        },
        text: 'Message 3',
        date: '2023-11-02 11:02:31',
    }
];


function buildMessage(messageObj) {
    let nickname = messageObj.user.nickname;
    let date = messageObj.date;
    let text = messageObj.text;

    let messageBlock = '';
    messageBlock += `${nickname} -- ${date}\n\n`;
    messageBlock += text;

    return messageBlock;
}

function displayMessage(block) {
    console.log(block);
}

messages.map(function (message) {
    let block = buildMessage(message)

    displayMessage(block);
});
