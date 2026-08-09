/*
npm i typescript
npm i -g typescript
tsc -v
tsc
*/
// Basic Types
let id = 5;
let first_name = 'Keyur';
let last_name = 'Rajpara';
let isPublished = true;
let x = 'Hello';
let ids = [1, 2, 3, 4, 5];
ids.push(6);
let array = [1, true, 'Hello'];
// Tuple
let person = [1, 'Hello', false];
// Tuple Array
let employee;
employee = [[1, "Liam"], [2, "Jane"]];
// Union
//let pID: string | number = 22;
let pID;
pID = '22';
// Enum
var Direction1;
(function (Direction1) {
    //Up, Down, Left, Right // Default starts from 0
    Direction1[Direction1["Up"] = 1] = "Up";
    Direction1[Direction1["Down"] = 2] = "Down";
    Direction1[Direction1["Left"] = 3] = "Left";
    Direction1[Direction1["Right"] = 4] = "Right";
})(Direction1 || (Direction1 = {}));
;
console.log(Direction1.Up);
console.log(Direction1.Down);
console.log(Direction1.Left);
console.log(Direction1.Right);
const user = {
    id: 1,
    name: 'Liam'
};
console.log(user);
// Type Assertion
let cid = 1;
// let customerId = <number>cid;
let customerId = cid;
console.log(customerId);
// Functions
function addNum(x, y) {
    return x + y;
}
let sum = addNum(10, 20);
console.log(sum);
function log(message) {
    console.log(message);
}
log("Hi there");
log(123);
;
const user1 = {
    id: 1,
    name: 'John'
};
// user1.id = 5; // Not allowed because it is readonly
user1.name = 'Liam';
const p1 = 1;
const add = (x, y) => x + y;
const sub = (x, y) => x - y;
;
class Person {
    id; // public, private, protected
    name; // public, private, protected
    constructor(id, name) {
        this.id = id;
        this.name = name;
    }
    register() {
        return `${this.name} is now registered`;
    }
}
const keyur = new Person(1, "Keyur");
console.log(keyur);
console.log(keyur.register());
class Employee extends Person {
    position;
    constructor(id, name, position) {
        super(id, name);
        this.position = position;
    }
}
const employeeObject = new Employee(3, 'Liam', 'Developer');
console.log(employeeObject.name);
console.log(employeeObject.register());
export {};
//# sourceMappingURL=index.js.map