//console.log("app serve Cam4dolar");
console.log('====================================');
const axios = require('axios')
    //const database = require('./sqlConnection');
let time = 5000;
let url_dolar = 'https://api.cam4studio.com/dolar';
let url_api = 'https://cam4studio.com/dolarcity';
setTimeout(get_msg, time);

async function carga() {
    // console.log("load *********** dolar script ** " + await get_hr());
    await getydolar();
}
async function get_msg() {
    console.log("*********** SLEEP ***** APP ******** WAITING ********** \n " + await get_hr())
    setTimeout(carga, time);
}
async function get_hr() {
    nDate = new Date().toLocaleString('en-US', {
        timeZone: 'America/Bogota'
    });
    return nDate;
}


const get_dolar = async() => {
    try {
        return await axios.get(url_dolar)
    } catch (error) {
        console.error(error)
    }
}
const getydolar = async() => {
    const dolares = await get_dolar()
    const dolar_str = dolares.data.dolar_str
    const dolar = dolares.data.dolar
    const dolar2 = dolares.data.dolar_proy.slice(0, 8);
    let date3 = dolares.data.date
    let date_format = date3;

    date_format = date_format.replace("/", "-");
    date_format = date_format.slice(0, 9);
    date_format = date_format.replace("/", "-");

    let fecha = date_format.split("-");
    let new_formater_fecha, fecha_dia;

    if (fecha[0] < 10) {
        new_formater_fecha = "0" + fecha[0];
    }

    new_formater_fecha = new_formater_fecha + date_format.slice(1, 9);

    if (fecha[1] < 10) {
        fecha_dia = "0" + fecha[1];
    } else fecha_dia = fecha[1]
    new_formater_fecha = fecha[2] + "-" + new_formater_fecha.slice(0, 2) + "-" + fecha_dia;
    /*
        let SQL = "SELECT trm FROM dolars WHERE date  = '" + new_formater_fecha + "'";

        database.query(SQL, function(err, result1) {
            if (err) {
                console.error(err.message);
                console.log("Error TRM Database° ");
                database.end();
                process.exit();
            }
            if (result1.length > 0) {
                console.log("Registro TRM  ya existe! update for dolar to tomorrow.. ");
                SQL = 'UPDATE  dolars SET trm2  = ' + " ' " + dolar2 + "'" + 'where date = ' + " ' " + new_formater_fecha + "'";

            } else {
                SQL = 'INSERT INTO dolars (trm, trm2, date) VALUES (' + dolar + ', "' + dolar2 + '", "' + new_formater_fecha + '")';
                console.log("Registro TRM Insertado! ");
            }

        });
        */

    let respu = axios({
        method: 'post',
        url: url_api,
        params: {
            dolar: dolar,
            date3: new_formater_fecha,
            trm2: dolar2,
            key: 'kasndjknsdf654sdf4sdf5sdf5s65x55df5hu5yui5u5i5ui5us5s52f26gh52ghjhg5j5hgj5hgjg33211xxfg44644535355f5g5b5v2v2v22d2d22dd2d2cxxzz7'
        }
    }).then((res) => {
        console.log("Exe TRM")
    })

    /*
    database.query(SQL, function(err, result) {
        if (err) {
            console.error(err.message);
            database.end();
            process.exit();
        }
        database.end();
        console.log("se cerro conexion db..")
        process.exit();
    });
    */



}