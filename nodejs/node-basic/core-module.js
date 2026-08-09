/* https://nodejs.org/api/path.html */
const path = require('path');
const fileName = path.join(__filename);
console.log(fileName); // E:\xampp\htdocs\my_github\nodejs_examples\node-basic\core-module.js
const baseName = path.basename(fileName);
console.log(baseName); // core-module.js

const fileExtension = path.extname(baseName);
console.log(fileExtension); // .js

const fs = require('fs');
fs.copyFileSync("file1.txt","file2.txt");