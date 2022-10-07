const ruleEqual = ["keokeo", "buabua", "baobao"];
const ruleWin = ["keobao", "baobua", "buakeo"];
const ruleLose = ["keobua", "buabao", "baokeo"];

let user_one = "keo";
let user_two = "bua";

let sumUsers = user_one + user_two;
let result = null;

soSanh(sumUsers);

console.log(result);

user_one = "bao";
user_two = "bao";
sumUsers = user_one + user_two;
soSanh(sumUsers);
console.log(result);




let ketqua = null;

if (1 == 2) {
    ketqua = "hoa";
}

console.log(ketqua);




































function soSanh(sumUsers) {
    if (ruleEqual.includes(sumUsers)) {
        result = {
          player1: user_one,
          player2: user_two,
          result: "HOA",
        };
      } else if (ruleWin.includes(sumUsers)) {
        result = {
          player1: user_one,
          player2: user_two,
          result: "WIN",
        };
      } else {
        result = {
          player1: user_one,
          player2: user_two,
          result: "LOSE",
        };
      }
}