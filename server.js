const { PORT, DATABASE_LOGIN, DATABASE_PASSWORD, DATABASE } = require('./config.json');
console.dir(PORT);
const WebSocketServer = require("ws").Server;
const wss = new WebSocketServer({ port: PORT });
var tabl = new Set();
const mysql = require("sync-mysql");
var today;
async function sqlquery(query) {
    result = con.query(query);
    return result;
}

const con = new mysql({ //à changer avec les paramètres du serveur mysql
    host: "localhost",
    user: DATABASE,
    password: DATABASE_PASSWORD,
    database: DATABASE
});


wss.on("connection", function (ws) {
    console.log("nouvelle connection");
    ws.on("message", async function (str) {
        try {
            var obj = JSON.parse(str);
        }
        catch (error) {
            var obj = { err: "not json object" };
        }
        console.log(obj);
        switch (obj.event) {
            case "debutrun":
                today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth()+1; 
                var yyyy = today.getFullYear();
                if(dd<10) 
                {
                    dd='0'+dd;
                } 
                if(mm<10) 
                {
                    mm='0'+mm;
                }
                
                var minutes = today.getMinutes();
                var hour = today.getHours();
                if(minutes<10) 
                {
                    minutes='0'+minutes;
                } 
                if(hour<10) 
                {
                    hour='0'+hour;
                } 
                today = dd+'/'+mm+'/'+yyyy+'-'+hour+'h'+minutes;
                break;
            case "dataFromCar":
                data = JSON.stringify(obj);
                wss.clients.forEach(client => client.send(data));
                sqlquery("INSERT INTO `data` (`dataid`, `temps`, `vitesse`, `consommation`, `lat`, `lon`) VALUES ('"+today+"', '"+obj.temps+"', '"+obj.vitesse+"', '"+obj.consommation+"', '"+obj.latt+"', '"+obj.long+"');");
                break;
            case "nouveautracer":
		console.log("nouveau tracer");
                var base64Data = obj.imageurl.replace("data:image/png;base64,", "");
                require("fs").writeFile("public_html/Cartes/out.png", base64Data, 'base64', function (err) { });
                break;
        }

    })

    ws.on("close", function () {
        tabl.delete(ws);
    })

})

