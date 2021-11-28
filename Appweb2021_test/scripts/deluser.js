const worker = new SharedWorker("../scripts/worker.js");
var webSocketState = WebSocket.CONNECTED;
worker.port.start();
function task(){
    setTimeout(function() {
    postMessageToWSServer({ event: "getuserlist" });
    },300);
}
task(); //on envoie la demande 300ms après avoir ouvert la page pour attendre que la connexion soit ouverte


worker.port.onmessage = event => {
    switch (event.data.type) {
        case "WSState":
            webSocketState = event.data.state;
            break;
        case "message":
            userlist = event.data.list;
            for (var i = 0; i < userlist.length; i++) {
                var nomtemp = userlist[i].nom;
                var prenomtemp = userlist[i].prenom;
                var useridtemp = userlist[i].userid;
                var tableRef = document.getElementById("userlist").getElementsByTagName("tbody")[0];
                var newRow = tableRef.insertRow(tableRef.rows.length);
                newRow.innerHTML = "<td>" + nomtemp + "</td>" + "<td>" + prenomtemp + "</td>" + "<td>" + useridtemp + "</td>" + '<button type="button" id="suppuser' + i + '" class="bouton">Supprimer</button>';
                document.getElementById("suppuser" + i).onclick = buttonclickdeluser(i);
            }
            function buttonclickdeluser(i) { //obligé de créer une fonction a cause de la boucle for
                return function () {
                    toSend = {
                        event: "deluser",
                        userid: userlist[i].userid
                    }
                    postMessageToWSServer(toSend);
                }
            }
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
            from: "deluser",
            data: input
        });
    }
}