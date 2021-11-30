const WebSocketServer = require("ws").Server;
const wss = new WebSocketServer({ port: 81 });
var tabl = new Set();
const mysql = require("sync-mysql");



function sqlquery(query) {
    result = con.query(query);
    return result;
}



const con = new mysql({ //à changer avec les paramètres du serveur mysql
    host: "localhost",
    user: "root",
    password: "root",
    database: "emt2021"
});

wss.on("connection", function (ws) {
    ws.on("message", async function (str) {
        try {
            var obj = JSON.parse(str);
        }
        catch (error) {
            var obj = { err: "not json object" };
        }
        console.log(obj);
        switch (obj.event) {
            case "connexionEntrant":
                prenom = sqlquery("SELECT `prenom` FROM `utilisateur` WHERE `userid` = '" + obj.userid + "'")
                ws.send(JSON.stringify({ event: "connexion", prenom: prenom[0].prenom }));
                break;
            case "dataFromCar":
                data = JSON.stringify(obj);
                wss.clients.forEach(client => client.send(data));
                break;
            case "nouveautracer":
                var base64Data = obj.imageurl.replace("data:image/png;base64,", "");
                require("fs").writeFile("Cartes/out.png", base64Data, 'base64', function (err) { });
                break;
        }

    })

    ws.on("close", function () {
        tabl.delete(ws);
    })

})

