const WebSocketServer = require("ws").Server;
const wss = new WebSocketServer({ port: 81 });
var tabl = new Set();

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

