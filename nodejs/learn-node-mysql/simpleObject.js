console.log(global);
console.log("Hello World");
global.console.log("Hello World");
setTimeout(function(){ console.log("Hello World") },1000);
global.setTimeout(function(){ console.log("Hello World") },1000);
var myVariable = "I am a simple variable";
console.log(myVariable);
console.log(global.myVariable);