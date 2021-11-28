const worker = new SharedWorker("../scripts/worker.js");


var webSocketState = WebSocket.CONNECTING;

// Connect to the shared worker
worker.port.start();

// Set an event listener that either sets state of the web socket
// Or handles data coming in for ONLY this tab.
worker.port.onmessage = event => {
  switch (event.data.type) {
    case "WSState":
      webSocketState = event.data.state;
      break;
    case "message":
      if (!event.data.canpass) {
        document.getElementById("error").innerHTML = event.data.error;
      }
      else {
        sessionStorage.setItem("nom", event.data.nom);
        sessionStorage.setItem("prenom", event.data.prenom);
        window.location.replace("../pages/data.html");
      }
      break;
  }
};

// Set up the broadcast channel to listen to web socket events.
// This is also similar to above handler. But the handler here is
// for events being broadcasted to all the tabs.
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
      from: "login",
      data: input
    });
  }
}
document.getElementById("loginbutton").onclick = function () {
  loginfos = {
    event: "connexionEntrant",
    userid: document.getElementById("login").value,
    mdp: document.getElementById("mdp").value
  };
  sessionStorage.setItem("userid", loginfos.userid);
  sessionStorage.setItem("mdp", loginfos.mdp);
  postMessageToWSServer(loginfos)
}

