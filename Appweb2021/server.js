const WebSocketServer = require("ws").Server;
const wss = new WebSocketServer( {port : 81});
var tabl = new Set();
const mysql = require("sync-mysql");
var donnees="";

function getsqldata(){
   result = con.query("SELECT * FROM `data` WHERE `dataid` = 1")
    return result;
}
function getsqlusers(userid){
    result = con.query("SELECT * FROM `utilisateur` WHERE `userid` = '"+userid+"'");
    return result;
 }



    const con = new mysql({
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
        console.dir(obj);
        result = await getsqlusers(obj.userid);
        if(result.length==0){
            console.log("Utilisateur non trouvé dans la BDD");
            ws.close();
            return;
        }
        
        if(obj.mdp==!result.mdp){ ; 
            console.log("Mdp incorrect");
            ws.close()
            return
        }
        console.log("Utilisateur et mdp correct");

        
        
        donnees=getsqldata("SELECT * FROM `data` WHERE `dataid` = 1")
               
        console.log(donnees);
        ws.send(JSON.stringify(donnees));
    


    })

    ws.on("close", function(){
        tabl.delete(ws);
    })

})
/*
for(var Client of tabl){
    Client.send(JSON.stringify({data}))
}
*/
