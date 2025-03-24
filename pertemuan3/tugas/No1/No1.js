let activity = "Program deret Fibonacci";
console.log(activity);

function fibonacci(index) {

    let fibci = [];
    let a = 0;
    let b = 1;

    for (let i = 0; i < index; i++) {
        fibci.push(a);
        let next = a + b;
        a = b;
        b = next; 
    }
    return fibci;

}

let jumlah = 8;
let hasil = fibonacci(jumlah);
console.log("Deret Fibonacci 8 : ", hasil.join(", "));