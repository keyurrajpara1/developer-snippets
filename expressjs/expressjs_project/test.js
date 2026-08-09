import dotenv from "dotenv";

dotenv.config();

console.log(process.env.APP_PORT);
console.log(process.env.DB_HOST);
console.log(process.env.DB_USERNAME);