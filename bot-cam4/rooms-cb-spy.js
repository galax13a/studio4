const puper = require("puppeteer");
const path = require("path");
const fs = require("fs");

let naver = true;
let seg = 1000;
//console.log("****  Rooms spycams Web ... v1.0");
nDate = new Date().toLocaleString('en-US', {
    timeZone: 'America/Bogota'
});
console.log(" *********** Starting app  room cb-spycams *** " + nDate);
setTimeout(get_msg, seg);

async function carga() {
    await get_rooms();
}
async function get_msg() {
    //console.log("*********** WAITING cb spy ********** \n " + await get_hr())
    setTimeout(carga, seg);
}

async function get_hr() {
    nDate = new Date().toLocaleString('en-US', {
        timeZone: 'America/Bogota'
    });
    return nDate;
}

async function get_rooms() {

    date = await get_hr();
    const browser = await puper.launch({
        headless: naver,
        slowMo: 300,
        args: ['--no-sandbox', '--disable-setuid-sandbox', '--use-gl=egl']
    })

    try {
        const page = await browser.newPage();
        await page.setUserAgent('5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (HTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36');
        let sala = "https://chaturbate.com/spy-on-cams/"

        await page.goto(sala); // visiita la sala de exhibitionist rooms
        await page.waitForSelector('#close_entrance_terms');
        await page.click("#close_entrance_terms");
        // console.log("************* Close Terms y 300 seg ***************")
        await page.waitForTimeout(300);
        await page.waitForSelector('#social-media-icons');

        let pagine_ultimo = await page.evaluate(() =>
            Array.from(
                document.querySelector("#roomlist_pagination > ul > li:nth-child(4) > a").innerText
            )
        );

        try {
            let datos2 = new Array();
            datos2.push({
                "api": "Botcam v1.0 spy-cams Chaturbate",
                "total_page": pagine_ultimo,
                "script": await get_hr()
            });

            if (pagine_ultimo > 1) {
                for (i = 1; i <= pagine_ultimo; i++) {
                    await page.goto(sala + "?page=" + i);
                    await page.waitForSelector('#social-media-icons');
                    urls = await page.evaluate(() =>
                        Array.from(
                            document.querySelectorAll("#room_list .details .title a"),
                            (nodo) => nodo.href
                        )
                    );
                    await page.waitForTimeout(200);

                    datos2.push({
                        "rooms": urls.length,
                        "page": i,
                        "date": await get_hr(),
                        "url": urls
                    });
                    console.log(` Page : ${i} de : ${pagine_ultimo}`)
                    if (i == pagine_ultimo) {
                        datos = JSON.stringify(datos2);
                        fs.writeFileSync(path.join(__dirname, "cb-spycams.json"), datos); //save file
                        // console.log("Save Cam-spy chaturbate json OK!! READY")
                    }
                }
            }
        } catch (error) {
            console.log("No error: " + error)
            process.exit();
        }
        console.log('******** Finish Rooms Chaturbate spycams *** ' + await get_hr())
        console.log("\n")
        browser.close();
        // process.exit();

    } catch (error) {
        console.log(error);

    }
}