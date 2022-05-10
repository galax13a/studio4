// Importing MySQL module
const mysql = require("mysql");
require('dotenv').config()
    // Creating connection
let db_con = mysql.createConnection({
    host: "localhost",
    user: process.env.DB_USERNAME,
    password: process.env.DB_PASSWORD,
    database: process.env.DB_DATABASE
});

// Connect to MySQL server
db_con.connect((err) => {
    if (err) {
        console.log("Database Connection Failed !!!", err);
    } else {
        console.log("connected ON! to Database..");
    }
});

module.exports = db_con;