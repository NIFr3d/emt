const WebSocketServer = require("ws").Server;
const wss = new WebSocketServer( {port : 81});
var tabl = new Set();
const mysql = require("sync-mysql");

function getsqldata(){
   result = con.query("SELECT * FROM `data` WHERE `dataid` = 1")
    return result;
}
function getsqlusers(userid){
    result = con.query("SELECT * FROM `utilisateur` WHERE `userid` = '"+userid+"'");
    return result;
 }
 function addsqluser(json){
     con.query("INSERT INTO `utilisateur` (`nom`, `prenom`, `mdp`, `acces`, `userid`) VALUES ('"+json.nom+"', '"+json.prenom+"', '"+json.mdp+"', '"+json.acces+"', '"+json.userid+"')");
 }
 function sqlquery(query){
     con.query(query);
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
        if(obj.event=="connexionEntrant"){
            obj.userid=obj.userid.replace("`","") //on empeche les injections sql (piratage) en supprimant les caractères dangereux
            var result = await getsqlusers(obj.userid); //on fait une requete sql des données associées à l'identifiant entré
            if(result.length==0){ //si le résultat de la requète est vide, l'utilisateur n'existe pas
                console.log("Utilisateur non trouvé dans la BDD");
                ws.close(4001,"Identifiant incorrect"); //codes custom >4000, utilisés pour changer le msg de refus de connexion
                return;
            }
            if(obj.mdp!=result[0].mdp){ //si mdp ne correspond pas
                console.log("Mdp incorrect");
                ws.close(4002,"Mot de passe incorrect");
                return
            }
            console.log("Utilisateur et mdp correct"); //sinon c'est ok
            var donnees= await getsqldata("SELECT * FROM `data` WHERE `dataid` = 1") //on recup les données depuis mysql
            donneesenvoyees={ //données a envoyer au client pour les afficher
                event:"connexion",
                nom:result[0].nom,
                prenom:result[0].prenom,
                acces:result[0].acces,
                temps:donnees[0].temps,
                vitesse:donnees[0].vitesse,
                consommation:donnees[0].consommation
            }
            ws.send(JSON.stringify(donneesenvoyees));
        }
        if(obj.event=="adduser"){
            addsqluser(obj);
        }
        if(obj.event=="dataFromCar"){
            data=JSON.stringify(obj);
            wss.clients.forEach(client => client.send(data));
        }

    })

    ws.on("close", function(){
        tabl.delete(ws);
    })

})

