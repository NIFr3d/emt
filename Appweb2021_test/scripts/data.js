const worker = new SharedWorker("../scripts/worker.js");
var webSocketState = WebSocket.CONNECTED;
worker.port.start();
postMessageToWSServer("");
document.getElementById("prenom").innerHTML = sessionStorage.prenom
worker.port.onmessage = event => {
    switch (event.data.type) {
        case "WSState":
            webSocketState = event.data.state;
            break;
        case "message":
            document.getElementById("temps").innerHTML = event.data.temps;
            document.getElementById("vitesse").innerHTML = event.data.vitesse;
            document.getElementById("conso").innerHTML = event.data.consommation;
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
            from: "data",
            data: input
        });
    }
}
var canevas = document.getElementById("canevas");
contexte = canevas.getContext("2d");
var flipflop = true;
const envoitracer = document.getElementById('envoitracer');
canevas.addEventListener('mousedown', function (e) {
    var rect = e.target.getBoundingClientRect();
    var x = e.clientX - rect.left; //x position within the element.
    var y = e.clientY - rect.top;  //y position within the element
    canevas.oncontextmenu = function (e) { e.preventDefault(); e.stopPropagation(); }
    switch (e.button) {
        case 2:                //clic droit
            flipflop = true;
            break;

        case 0:                //clic gauche
            if (flipflop) {
                contexte.beginPath();
                contexte.moveTo(x, y);
                flipflop = false;
            }
            else {
                contexte.lineTo(x, y);
                contexte.stroke();
            }
            break;

        default:
            console.log('Pas un clic');
    }
});
envoitracer.addEventListener('click', function (e) {
    toSend = {
        event: "nouveautracer",
        imageurl: canevas.toDataURL()
    }
    postMessageToWSServer(toSend);
});

