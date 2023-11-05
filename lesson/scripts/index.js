
function sayHi(name, surname = '[no data]') {
    // ****
    alert(`Hi ${name} ${surname}`);
}

// sayHi('Test');
// sayHi('evgenii', 'Tarasenko');

// ------------------

// let result = prompt('test');


// function isNegative(num) {
//     let trueResult = true;
//     let falseResult = false;
//
//     if (num === 0) {
//         return;
//     }
//
//     let result = num < 0;
//
//     return result ? trueResult : falseResult;
// }
//
// console.log(isNegative(1));
//
// let result = isNegative(-1);
// console.log(result);
//
// console.log(isNegative(0))

// ---------------------

// let whileIndex = 0
// while (whileIndex < 3) {
//     alert(`Hi ${whileIndex++}`);
// }


// /*
//  * Ре
//  *
//  * count - Кількість повторів
//  * index - Дефолтне значення лічильнику
//  *
//  * return void
//  */
// function recursiveSayHi(count, index = 0) {
//     if (index >= count) {
//         return;
//     }
//
//     alert(`Hi ${index}`);
//
//     index += 1;
//     recursiveSayHi(count, index);
// }
//
// recursiveSayHi(5);

// ---

// setInterval(function () {
//     console.log('hi');
// }, 2000);
//
// setInterval(() => {
//     console.log('hi1');
// }, 2000);
//
// setInterval(() => {
//     return console.log('hi2')
// }, 2000);
//
// setInterval(() => sayHi('Evgenii'), 2000);

let userArr = [1, 'Evgenii', 'qwerty', '2023-11-02'];
let userArrId = userArr[0];

let userObj = {
    id: 1,
    name: 'Evgenii',
    nickname: 'qwerty',
    registered_at: '2023-11-02',
    'two words': 'test val',
    nullVar: null,
    hasName: function() {
        return !!this.name;
    },
    newArr: [1, 2, 4],
    insideObj: {
        id: 2,
        name: 'q312312',
    }
};

let newObj = JSON.parse(JSON.stringify(userObj));

console.log(userObj.hasName())

let idKey = 'id';
let userObjId = userObj.id = userObj['id'] = userObj[idKey];

let userObjIdYwoWords = userObj['two words'];

for (let key in userObj) {
    // console.log(`${key} - ${userObj[key]}`);
}

userObj.id = 2;
userObj['name'] = "test";

userObj.newProp = 'new value';
userObj['newProp1'] = "test";
userObj['registered_at'] = null;

delete userObj.nickname;

console.log(userObj);
