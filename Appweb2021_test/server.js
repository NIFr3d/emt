const WebSocketServer = require("ws").Server;
const wss = new WebSocketServer( {port : 81});
var tabl = new Set();
const mysql = require("sync-mysql");


function getsqlusers(userid){
    result = con.query("SELECT * FROM `utilisateur` WHERE `userid` = '"+userid+"'");
    return result;
 }
 function addsqluser(json){
     con.query("INSERT INTO `utilisateur` (`nom`, `prenom`, `mdp`, `acces`, `userid`) VALUES ('"+json.nom+"', '"+json.prenom+"', '"+json.mdp+"', '"+json.acces+"', '"+json.userid+"')");
 }
 function getuserslist(){
     result=con.query("SELECT `nom`, `prenom`, `userid` FROM `utilisateur`")
     return result;
 }
 function removeusersql(userid){
    con.query("DELETE FROM `utilisateur` WHERE `userid`='"+userid+"'");
 }
 function sqlquery(query){
    result=con.query(query);
    return result;
 }



    const con = new mysql({ //à changer avec les paramètres du serveur mysql
       host: "localhost",
       user: "root",
       password: "root",
       database : "emt2021"
     });
    
wss.on("connection", function(ws){
    ws.on("message",async function(str){
        try{
        var obj = JSON.parse(str);
        }
        catch(error){
            var obj = {err:"not json object"};
        }
        console.log(obj);
        switch (obj.event){
        case "connexionEntrant":
            obj.userid=obj.userid.replace("`","") //on empeche les injections sql (piratage) en supprimant les caractères dangereux
            obj.userid=obj.userid.replace("'","")
            var result = await getsqlusers(obj.userid); //on fait une requete sql des données associées à l'identifiant entré
            if(result.length==0){ //si le résultat de la requète est vide, l'utilisateur n'existe pas
                console.log("Utilisateur non trouvé dans la BDD");
                ws.send(JSON.stringify({event:"refuscon",type:"Identifiant incorrect"}));
                return;
            }
            if(obj.mdp!=result[0].mdp){ //si mdp ne correspond pas
                console.log("Mdp incorrect");
                ws.send(JSON.stringify({event:"refuscon",type:"Mot de passe incorrect"}));
                return;
            }
            console.log("Utilisateur et mdp correct"); //sinon c'est ok
            nom=sqlquery("SELECT `nom` FROM `utilisateur` WHERE `userid` = '"+obj.userid+"'")
            prenom=sqlquery("SELECT `prenom` FROM `utilisateur` WHERE `userid` = '"+obj.userid+"'")
            ws.send(JSON.stringify({event:"autorisationcon",nom:nom[0].nom,prenom:prenom[0].prenom}));
            break;
        case "adduser":
            addsqluser(obj);
            break;
        case "dataFromCar":
            data=JSON.stringify(obj);
            wss.clients.forEach(client => client.send(data));
            break;
        case "getuserlist":
            userlist=getuserslist()
            toSend={
                event:"userlist",
                list:userlist
            }
            ws.send(JSON.stringify(toSend))
            break;
        case "deluser":
            removeusersql(obj.userid);
            break;
        case "nouveautracer":
            var base64Data = obj.imageurl.replace("data:image/png;base64,", "");
            require("fs").writeFile("Cartes/out.png", base64Data, 'base64', function(err) {});
            break;
        }

    })

    ws.on("close", function(){
        tabl.delete(ws);
    })

})

