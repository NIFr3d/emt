var islogged=sessionStorage.islogged;
if(islogged!=true){
    sessionStorage.clear();
    window.location.replace("../pages/login.html");
}
const worker = new SharedWorker("../scripts/worker.js");
var webSocketState = WebSocket.CONNECTED;
worker.port.start();
postMessageToWSServer("");

worker.port.onmessage = event => {
    switch (event.data.type) {
        case "WSState":
            webSocketState = event.data.state;
            break;
        case "message":
            break;
    }
};


const broadcastChannel = new BroadcastChannel("WebSocketChannel");
broadcastChannel.addEventListener("message", event => {
    switch (event.data.type) {
        case "WSState":
            webSocketState = event.data.state;
            break;
        case "message":
            break;
    }
});

function handleMessageFromPort(data) {
    console.log(data);
}


function postMessageToWSServer(input) {
    if (webSocketState === WebSocket.CONNECTING) {
        console.log("Still connecting to the server, try again later!");
    } else if (webSocketState === WebSocket.CLOSING || webSocketState === WebSocket.CLOSED) {
        console.log("Connection Closed!");
    } else {
        worker.port.postMessage({
            from: "adduser",
            data: input
        });
    }
}
document.getElementById("adduserbutton").onclick = function () { //ajout d'utilisateur
    toSend = {
      event: "adduser",
      userid: document.getElementById("login1").value,
      nom: document.getElementById("nom1").value,
      prenom: document.getElementById("prenom1").value,
      mdp: document.getElementById("mdp1").value,
      acces: document.getElementById("acces1").value,
    }
    if (toSend.userid != "" && toSend.nom != "" && toSend.prenom != "" && toSend.mdp != "" && toSend.acces != "") { //on vérifie qu'aucun champ n'est vide
      postMessageToWSServer(toSend);
      document.getElementById("addusererror").style.display = "none";
      document.getElementById("addusersuccess").style.display = "block";
    }
    else { //on affiche une erreur si les champs ont été mal remplis
      document.getElementById("addusererror").style.display = "block";
      document.getElementById("addusersuccess").style.display = "none";
    }
}

