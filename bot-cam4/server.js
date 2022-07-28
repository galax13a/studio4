const path = require("path");
const fs = require("fs");

const newdate = new Date().toLocaleString('en-US', {
    timeZone: 'America/Bogota'
});

const express = require('express')
const cors = require('cors')
const bodyParser = require('body-parser');

const app = express()
const port = 3026


app.use(cors()) // usnado cors para mejorar el rendimiento del app

var server = app.listen(port, function() {
    console.log('Ready on port %d', server.address().port);
});

app.get('/', (req, res) => {
    res.send('Hello API beta***** Cams.com! ')

})
app.get('/dolar', (req, res) => {
    // res.send('Dolar API CAM4.com!')
    let rawdata = fs.readFileSync('dolar.json');
    let dolar_json = JSON.parse(rawdata);
    res.json(dolar_json)
    console.log("api service dolar")
})
app.get('/chaturbate-exhibitionist-cams', (req, res) => {
    let rawdata = fs.readFileSync('cb-exhibitionist-cams.json');
    let data = JSON.parse(rawdata);
    res.json(data)
    console.log("api service exhibitionist CB")

})
app.get('/cbhrs', (req, res) => {
    res.send('cb hrs API CAM4.com!')
})

app.get('/chaturbate-spy', (req, res) => {
    let rawdata = fs.readFileSync('cb-spycams.json');
    let data = JSON.parse(rawdata);
    res.json(data)
    console.log("api service Spy CB")
})