// let num = 4;

// if (num%2 === 0) {
//     alert('Парне');
// } else {
//     alert('Не');
// }
//
// num%2 === 0 ? alert('Парне') : alert('Не парне');
//
// alert(num%2 === 0 ? 'Парне' : 'Не парне')

// -------------------

// let num = 1;
//
// switch (num) {
//     case 1:
//         alert('First');
//         break;
//     case 2:
//     case 3:
//         alert('Second');
//         break;
// }
//
// if (num === 1) {
//     alert('First');
// } else if (num === 2 || num === 3) {
//     alert('Second');
// }

// -----------------
//
// let arr = [1, 2, 3, 4];
//
// console.log(arr);
//
// // delete arr[1];
// arr.splice(-3, 2);
//
//
// console.log(arr);


// let l = arr.length;
// console.log(arr.length)


// ----------------


// let i = 1;
//
//
// while (i < 10) {
//     alert(i);
//     i++;
// }
//
//
// do {
//     alert(i);
//     i++;
// } while (i < 10);

// ----------------

// let i = 1;
// while (i < 10) {
//     alert(i);
//     i++;
// }

// for (let i = 1; i < 10; i++) {
//     alert(i);
// }


// ---------------

// let obj = {
//     size: 'value1',
//     color: 'value2',
//     test: 'value3',
// }
//
// for (let key in obj) {
//     alert(obj[key]);
// }

// for (let i = 1; i < 5; i++) {
//     //
//     for (let j = 1; j < 5; j++) {
//         alert(`i - ${i}, j - ${j}`);
//     }
//     //
// }

let desk = '';

for (let i = 1; i <= 2; i++) {
    // Формуємо перший рядок
    for (let j = 1; j <= 2; j++) {
        if (i%2 === 0) {
            if (j%2 === 0) {
                desk += '0 ';
            } else {
                desk += '# ';
            }
        } else {
            if (j%2 === 0) {
                desk += '# ';
            } else {
                desk += '0 ';
            }
        }
    }
    // при закінценні першого рядка - додаємо перенос рядка.
    desk += '\n';
}

console.log(desk)



