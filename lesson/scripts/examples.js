// let promise = new Promise(function(resolve, reject) {
//     const randNum = Math.random();
//     console.log(randNum);
//
//     if (randNum > 0.5) {
//         setTimeout(() => resolve("done!"), 3000);
//     } else {
//         setTimeout(() => reject(new Error("Помилка!")), 3000);
//     }
// });
//
// promise
//     .then((result) => console.log('Success: ' + result))
//     .catch((error) => console.log(error));


















//
// fetch('https://cat-fact.herokuapp.com/facts')
//     .then((response) => response.json())
//     .then((list) => console.log(list))