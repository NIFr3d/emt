const { PORT, DATABASE_LOGIN, DATABASE_PASSWORD, DATABASE } = require('./config.json');
console.dir(PORT);
const WebSocketServer = require("ws").Server;
const wss = new WebSocketServer({ port: PORT });
var tabl = new Set();
const mysql = require("sync-mysql");
var today;
var R = 6371000; //rayon de la terre en mètres
async function sqlquery(query) {
    result = con.query(query);
    return result;
}
var lastcords={
    lat:0,
    lon:0
};
var lasttemps=0;
const con = new mysql({ //à changer avec les paramètres du serveur mysql
    host: "localhost",
    user: DATABASE_LOGIN,
    password: DATABASE_PASSWORD,
    database: DATABASE
});
function distance(point1, point2) {
    var degToRad = Math.PI / 180;
    return R * degToRad * Math.sqrt(Math.pow(Math.cos(point1.lat * degToRad ) * (point1.lon - point2.lon) , 2) + Math.pow(point1.lat - point2.lat, 2));
}

wss.on("connection", function (ws) {
    console.log("nouvelle connexion");
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
                //today.setTime(today.getTime()+3600000);
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
                var hour = today.getHours()+1;
                var seconds = today.getSeconds();
                if(minutes<10) 
                {
                    minutes='0'+minutes;
                } 
                if(hour<10) 
                {
                    hour='0'+hour;
                }
                if(seconds<10) 
                {
                    seconds='0'+seconds;
                }  
                today = dd+'/'+mm+'/'+yyyy+'-'+hour+'h'+minutes+'m'+seconds+'s';
                break;
            case "dataFromCar":
                var cordsact={
                    lat:obj.latt,
                    lon:obj.long,
                }
                if(obj.temps-lasttemps==0){obj.temps+=1;}
                obj.vitesse=distance(cordsact,lastcords)*3.6/(obj.temps-lasttemps);
                lastcords=cordsact;
                lasttemps=obj.temps;
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

