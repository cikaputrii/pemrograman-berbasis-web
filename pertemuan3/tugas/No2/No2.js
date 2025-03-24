let activity = "Program kalkulator sederhana";
console.log(activity);

function kalkulator (operasi, x, y) {

    let result;
    
    switch (operasi) {
        case '+':
            result = x + y; 
            break;
        case '-':
            result = x - y; 
            break;
        case '*':
            result = x * y; 
            break;
        case '/':
            result = x / y; 
            break;
        case '%':
            result = x % y; 
            break;
        default:
            return 'Operasi tidak valid'; 
    }

    return result;
    
}

let jumlah = "3 + 10";
console.log(jumlah);
let result1 = kalkulator('+', 3, 10);
console.log(`Hasil Penjumlahan: ${result1}`);

let kurang = "10 - 3";
console.log(kurang);
let result2 = kalkulator('-', 10, 3); 
console.log(`Hasil Pengurangan: ${result2}`);

let kali = "3 * 10";
console.log(kali);
let result3 = kalkulator('*', 3, 10); 
console.log(`Hasil Perkalian: ${result3}`);

let bagi = "10/2";
console.log(bagi);
let result4 = kalkulator('/', 10, 2);
console.log(`Hasil Pembagian: ${result4}`);

let mod = "10 % 3";
console.log(mod);
let result5 = kalkulator('%', 10, 3);
console.log(`Hasil Modulus: ${result5}`);