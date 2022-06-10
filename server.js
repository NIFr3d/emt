const validtoken="L2eEzMs7ZMpNJYCQaECg";
const { PORT, DATABASE_LOGIN, DATABASE_PASSWORD, DATABASE } = require('./config.json');
console.dir(PORT);
const WebSocketServer = require("ws").Server;

const https = require('https');
const fs = require('fs');

const options = {
  key: fs.readFileSync('/home/emt/star.polytech-nancy.univ-lorraine.fr.key'),
  cert: fs.readFileSync('/home/emt/__polytech-nancy_univ-lorraine_fr_cert.cer')
};

//var serv_https = https.createServer(options).listen(PORT);
async function createDir(path){
    fs.access(path, (error) => {
                
        // To check if the given directory 
        // already exists or not
        if (error) {
            // If current directory does not exist
            // then create it
            fs.mkdir(path, (error) => {
            if (error) {
                console.log(error);
            } else {
                console.log("New Directory created successfully !!");
            }
            });
        } else {
            console.log("Given Directory already exists !!");
        }
        });
}

const wss = new WebSocketServer({ 
    verifyClient: (info, callback) => {
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
    //server:serv_https
    port:PORT
});
var tabl = new Set();
const mysql = require("sync-mysql");
var today;
var nbUtilisateurs=0;
var latdebut=0;
var longdebut=0;
var distance=0;
async function sqlquery(query) {
    result = con.query(query);
    return result;
}
var sumspeed=0;
var nbdonnees=0;
const con = new mysql({ //à changer avec les paramètres du serveur mysql
    host: "localhost",
    user: DATABASE_LOGIN,
    password: DATABASE_PASSWORD,
    database: DATABASE
});
wss.on("connection", function (ws) {
    console.log("nouvelle connexion");
    nbUtilisateurs=nbUtilisateurs+1;
    wss.clients.forEach(client => client.send(JSON.stringify({
        event:"nbUtilisateurs",
        nbUti:nbUtilisateurs
    })));
    ws.on("message", async function (str) {
        try {
            str=str.toString('utf8');
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
                sumspeed=0;
                nbdonnees=0;
                distance=0;
                if(typeof(obj.lati)=="number" && typeof(obj.long)=="number"){
                    latdebut=obj.lati;
                    latdebut=latdebut*Math.PI/180;
                    longdebut=obj.long;
                    longdebut=longdebut*Math.PI/180;
                    var lats=await sqlquery("SELECT lat FROM circuits");
                    var lons=await sqlquery("SELECT lon FROM circuits");
                    var zooms=await sqlquery("SELECT zoom FROM circuits");
                    var ids=await sqlquery("SELECT id FROM circuits");
                    for(var k=0;k<lats.length;k++){
                        var lat=lats[k].lat;
                        var lon=lons[k].lon;
                        var zoom=zooms[k].zoom;
                        
                        if(obj.lati<lat+0.00026730063*zoom && obj.lati>lat-0.0002679645*zoom && obj.long<lon+0.00053707733*zoom && obj.long>lon-0.00053580627*zoom){
                            var idcircuit=ids[k].id;
                            console.log("circuit trouvé");
                            await sqlquery("UPDATE circuits set actif=0");
                            await sqlquery("UPDATE circuits set actif=1 where id="+idcircuit);
                        }
                    }
                }
                break;
            case "dataFromCar":
                sumspeed+=obj.vitesse;
                nbdonnees+=1;
                obj.avgspeed=sumspeed/nbdonnees;
                obj.avgspeed=(obj.avgspeed).toFixed(3);
                var lattemp=obj.lati*Math.PI/180;
                var deltaLat=lattemp-latdebut;
                var longtemp=obj.long*Math.PI/180;
                var deltaLong=longtemp-longdebut;
                //var distancetemp = 2 * Math.asin(Math.sqrt(Math.pow(Math.sin(deltaLat/2), 2) + Math.cos(latdebut) * Math.cos(lattemp) * Math.pow(Math.sin(deltaLong/2), 2))) * 6371 * 1000;
                var a = Math.pow(Math.sin(deltaLat/2), 2) + Math.cos(latdebut) * Math.cos(lattemp) * Math.pow(Math.sin(deltaLong/2), 2);
                var c = 2 * Math.asin(Math.sqrt(a));
                var EARTH_RADIUS = 6371;
                distancetemp= c * EARTH_RADIUS * 1000;
                distance=distance + distancetemp;
                if(latdebut==0){
                    distance=0
                }
                console.log(distance);
                obj.distance=distance;
                obj.distance=(obj.distance).toFixed(2);
                latdebut=lattemp;
                longdebut=longtemp;
                data = JSON.stringify(obj);
                wss.clients.forEach(client => client.send(data));
                try{
                    await sqlquery("INSERT INTO `data` (`dataid`, `temps`, `vitesse`,`avgspeed`, `intensite`,`tension`,`energie`,`lat`, `lon`, `alt`, `lap`,`distance`) VALUES ('"+today+"', '"+obj.temps+"', '"+obj.vitesse+"', '"+obj.avgspeed+"', '"+obj.intensite+"', '"+obj.tension+"', '"+obj.energie+"', '"+obj.lati+"', '"+obj.long+"', '"+obj.alti+"', '"+obj.tour+"','"+obj.distance+"');");
                }catch(error){
                    console.log(error);
                }
                break;
            case "nouveautracer":
		        console.log("nouveau tracer");
                var base64Data = obj.imageurl.replace("data:image/png;base64,", "");
                circuit=await sqlquery("SELECT `nom` FROM `circuits` WHERE `actif`=1");
                const path = "/var/www/emt/public_html/Cartes/"+circuit[0].nom;
                await createDir(path);
                setTimeout(function(){
                    fs.writeFile("/var/www/emt/public_html/Cartes/"+circuit[0].nom+"/out.png", base64Data, 'base64', function (err) { });
                }, 2000);
                break;
            case "requetedonnees":
                data = JSON.stringify(obj);
                wss.clients.forEach(client => client.send(data));
                break;
            case "test":
                console.log("json");
                break;
            case "supprimercircuit":
                fs.rm("/var/www/emt/public_html/Cartes/"+obj.dossier,{recursive: true, force: true},function(){});
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

