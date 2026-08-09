/*
npm i typescript
npm i -g typescript
tsc -v
tsc
*/
// Basic Types
let id: number = 5;
let first_name: string = 'Keyur';
let last_name: string = 'Rajpara';
let isPublished: boolean = true;
let x: any = 'Hello';

let ids: number[] = [1, 2, 3, 4, 5];
    ids.push(6);
let array: any[] = [1, true, 'Hello'];

// Tuple
let person: [number, string, boolean] = [1, 'Hello', false];

// Tuple Array
let employee: [number, string][];
    employee = [ [1, "Liam"], [2, "Jane"] ];

// Union
//let pID: string | number = 22;
let pID: string | number;
    pID = '22';

// Enum
enum Direction1 {
    //Up, Down, Left, Right // Default starts from 0
    Up = 1, Down, Left, Right
};
console.log(Direction1.Up);
console.log(Direction1.Down);
console.log(Direction1.Left);
console.log(Direction1.Right);

// Objects
type User = {
    id: number,
    name: string
};
const user: User = {
    id: 1,
    name: 'Liam'
};
console.log(user);

// Type Assertion
let cid: any = 1;
// let customerId = <number>cid;
let customerId = cid as number;
console.log(customerId);

// Functions
function addNum(x: number, y: number): number{
    return x + y;
}
let sum = addNum(10, 20);
console.log(sum);

function log(message: string | number): void{
    console.log(message);
}
log("Hi there");
log(123);

// Interfaces
interface UserInterface {
    readonly id: number, // readonly property
    name: string,
    age?: number, // optional property
};
const user1: UserInterface = {
    id: 1,
    name: 'John'
};
// user1.id = 5; // Not allowed because it is readonly
user1.name = 'Liam';

type Point = number | string;
const p1: Point = 1;

interface MathFunc {
    (x: number, y: number): number;
}
const add: MathFunc = (x: number, y: number): number => x + y;
const sub: MathFunc = (x: number, y: number): number => x - y;

// Classes
interface PersonInterface {
    id: number
    name: string
    register(): string
};
class Person implements PersonInterface {
    id: number; // public, private, protected
    name: string; // public, private, protected
    constructor(id: number, name: string) {
        this.id = id;
        this.name = name;
    }
    register(){
        return `${this.name} is now registered`
    }
}
const keyur = new Person(1, "Keyur");
console.log(keyur);
console.log(keyur.register());

// Subclasses
class Employee extends Person{
    position: string
    constructor(id: number, name: string, position: string) {
        super(id, name);
        this.position = position;
    }
}
const employeeObject = new Employee(3, 'Liam', 'Developer');
console.log(employeeObject.name);
console.log(employeeObject.register());

// Generics
function getArray<T>(items: T[]): T[]{
    return new Array().concat(items)
}
let numArray = getArray<number>([1, 2, 3, 4])
let strArray = getArray<string>(['Liam', 'Jane', 'Noah'])
// strArray.push(1);

