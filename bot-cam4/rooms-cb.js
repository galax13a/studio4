const puper = require("puppeteer");
const path = require("path");
const fs = require("fs");

let time = 1000;
let headless = true;

nDate = new Date().toLocaleString('en-US', {
    timeZone: 'America/Bogota'
});
//console.log(" *********** Starting app Rooms Grays ******** " + nDate);
console.log("**** App Rooms Grays Web ... v1.2 *** " + nDate);
setTimeout(get_msg, time);

async function carga() {
    await get_rooms();
}
async function get_msg() {
    // console.log("*********** SLEEP ***** APP ******** WAITING ********** \n " + await get_hr())
    setTimeout(carga, time);
}

async function get_hr() {
    nDate = new Date().toLocaleString('en-US', {
        timeZone: 'America/Bogota'
    });
    return nDate;
}

async function get_rooms() {

    date = await get_hr();
    //  console.log("Start  *** Scripting ************  " + date);
    const browser = await puper.launch({
        headless: headless,
        slowMo: 360,
        args: ['--no-sandbox', '--disable-setuid-sandbox', '--use-gl=egl']
    })

    try {
        const page = await browser.newPage();
        await page.setUserAgent('5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36');

        let sala = "https://chaturbate.com/spy-on-cams/"
        let url = "https://chaturbate.com/exhibitionist-cams/"

        await page.goto(url); // visiita la sala de exhibitionist rooms
        await page.waitForSelector('#close_entrance_terms');
        await page.click("#close_entrance_terms");
        // console.log("************* Close Terms y 300 seg ***************")
        await page.waitForTimeout(300);
        await page.waitForSelector('#social-media-icons');

        let urls = await page.evaluate(() =>
            Array.from(
                document.querySelectorAll("#room_list .details .title a"),
                (nodo) => nodo.href
            )

        );
        // console.log("Urls CB : " + urls.length);
        let statsdata = [];

        statsdata.push({
            "api": "Botcam v1.0 / Rooms - Exhibitionist-cams / Chaturbate",
            "date": await get_hr(),
            "rooms": urls.length,
            "urls": urls
        });

        vjson = JSON.stringify(statsdata);
        fs.writeFileSync(path.join(__dirname, "cb-exhibitionist-cams.json"), vjson); //save file
        // recuperamos el archivo y modificamos a la fecha actual colombia

        try {

            let pagine_ultimo = await page.evaluate(() =>
                Array.from(
                    document.querySelector("#roomlist_pagination > ul > li:nth-child(4) > a").innerText
                )
            );

            if (pagine_ultimo > 1) {
                for (i = 2; i <= pagine_ultimo; i++) {
                    await page.goto(sala + "?page=" + i);

                    await page.waitForSelector('#social-media-icons');
                    urls = await page.evaluate(() =>
                        Array.from(
                            document.querySelectorAll("#room_list .details .title a"),
                            (nodo) => nodo.href
                        )
                    );
                    await page.waitForTimeout(200);
                    //console.log("\n new urls " + urls);
                }
            }
        } catch (error) {
            console.log("No se encontro mas paginados")
        }
        console.log('->Finish Rooms Chaturbate exhibitionist ****' + await get_hr())
        browser.close();
        console.log("\n")
        process.exit();

    } catch (error) {
        console.log(error);
        process.exit();

    }
}