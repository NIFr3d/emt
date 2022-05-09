const validtoken="L2eEzMs7ZMpNJYCQaECg"; //token de vérification
const { PORT, DATABASE_LOGIN, DATABASE_PASSWORD, DATABASE } = require('./config.json'); //on récupère les données de connection à la BDD
console.dir(PORT);
const WebSocketServer = require("ws").Server; //on importe les modules requis
const https = require('https');
const fs = require('fs');

const options = {
  key: fs.readFileSync('/home/emt/star.polytech-nancy.univ-lorraine.fr.key'), //on récupère les certificats pour la connexion sécurisée
  cert: fs.readFileSync('/home/emt/__polytech-nancy_univ-lorraine_fr_cert.cer')
};

var serv_https = https.createServer(options).listen(PORT); //on crée le serveur https

const wss = new WebSocketServer({ //on crée le serveur websocket
    verifyClient: (info, callback) => { //on vérifie que le client est autorisé à se connecter
        const token = info.req.url.split('token=')[1];
        var isValidToken = false;
        if(token==validtoken) isValidToken=true;
        if (!isValidToken) {
            console.log("Error: token not valid");
            callback(false, 401, 'Unauthorized');
        } else {
          callback(true);
        }
    },
    server:serv_https
});
var tabl = new Set();
const mysql = require("sync-mysql");
var today;
//var R = 6371000; //rayon de la terre en mètres
var nbUtilisateurs=0;
async function sqlquery(query) {
    result = con.query(query);
    return result;
}/*
var lastcords={
    lat:0,
    lon:0
};
var laplat;
var laplon;
var laps;
var lastlaptime;
var tempsdebut;
var lasttemps=new Date();*/
var sumspeed;
var nbdonnees;
const con = new mysql({ //à changer avec les paramètres du serveur mysql
    host: "localhost",
    user: DATABASE_LOGIN,
    password: DATABASE_PASSWORD,
    database: DATABASE
});/*
function distance(point1, point2) {
    var degToRad = Math.PI / 180;
    return R * degToRad * Math.sqrt(Math.pow(Math.cos(point1.lat * degToRad ) * (point1.lon - point2.lon) , 2) + Math.pow(point1.lat - point2.lat, 2));
}
function newlapcheck(temps,latnow,lonnow){
    if(temps>lastlaptime+10000){
        if(Math.abs(latnow-laplat)<0.0005 && Math.abs(lonnow-laplon)<0.0005){
            lastlaptime=temps;
            laps+=1;
        }
    }
}*/

wss.on("connection", function (ws) {
    console.log("nouvelle connexion");
    nbUtilisateurs=nbUtilisateurs+1;
    wss.clients.forEach(client => client.send(JSON.stringify({
        event:"nbUtilisateurs",
        nbUti:nbUtilisateurs
    })));
    ws.on("message", async function (str) {
        try {
            var obj = JSON.parse(str);
        }
        catch (error) {
            var obj = { err: "not json object" };
        }
        console.log(obj);
        switch (obj.event) {
            case "fromStrategy":
                data = JSON.stringify(obj);
                wss.clients.forEach(client => client.send(data));
                break;
            case "debutrun":
                today = new Date();
                tempsdebut=today;
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
                /*
                laplat=obj.lat;
                laplon=obj.lon;
                laps=0;
                var tempsact=new Date();
                lastlaptime=tempsact.getTime();
                 */
                sumspeed=0;
                nbdonnees=0;
                break;
            case "dataFromCar":
                /*var cordsact={
                    lat:obj.latt,
                    lon:obj.long,
                }
                var tempsact=new Date();
                if(tempsact.getTime()-lasttemps.getTime()==0){tempsact.setTime(tempsact.getTime()+1);}
                obj.vitesse=distance(cordsact,lastcords)*3600/(tempsact.getTime()-lasttemps.getTime());
                obj.vitesse=(obj.vitesse).toFixed(3);*/
                sumspeed+=obj.vitesse;
                nbdonnees+=1;
                obj.avgspeed=sumspeed/nbdonnees;
                obj.avgspeed=(obj.avgspeed).toFixed(3);
                /* obj.temps=(tempsact.getTime()-tempsdebut.getTime())/1000;
                /obj.temps=(obj.temps).toFixed();
                newlapcheck(tempsact.getTime(),obj.latt,obj.long);
                obj.laps=laps;*/
                data = JSON.stringify(obj);
                wss.clients.forEach(client => client.send(data));
                sqlquery("INSERT INTO `data` (`dataid`, `temps`, `vitesse`,`avgspeed`, `intensite`,`tension`,`energie`,`lat`, `lon`, `alt`, `lap`) VALUES ('"+today+"', '"+obj.temps+"', '"+obj.vitesse+"', '"+obj.avgspeed+"', '"+obj.intensite+"', '"+obj.tension+"', '"+obj.energie+"', '"+obj.lati+"', '"+obj.long+"', '"+obj.alti+"', '"+obj.laps+"');");
                /*lastcords=cordsact;
                lasttemps=tempsact;*/
                break;
            case "nouveautracer":
		        console.log("nouveau tracer");
                var base64Data = obj.imageurl.replace("data:image/png;base64,", "");
                circuit=await sqlquery("SELECT `nom` FROM `circuits` WHERE `actif`=1");
                require("fs").writeFile("/var/www/emt/public_html/Cartes/"+circuit[0].nom+"/out.png", base64Data, 'base64', function (err) { });
                break;
            case "requetedonnees":
                data = JSON.stringify(obj);
                wss.clients.forEach(client => client.send(data));
                break;
        }

    })

    ws.on("close", function () {
        tabl.delete(ws);
        nbUtilisateurs=nbUtilisateurs-1;
        wss.clients.forEach(client => client.send(JSON.stringify({
            event:"nbUtilisateurs",
            nbUti:nbUtilisateurs
        })));
    })

})

