console.log("Hello World");
console.log(__filename);
console.log(__dirname);
const square = require('./square.js');
const calculateSquare = (a) => {
	console.log(`The value of a is ${a} and the area is ` + square.area(a) + 
		` and the perimeter is ` + square.perimeter(a));
}
calculateSquare(5);