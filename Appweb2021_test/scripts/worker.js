const ws = new WebSocket("ws://localhost:81");

const broadcastChannel = new BroadcastChannel("WebSocketChannel");
const idToPortMap = {};

ws.onopen = () => broadcastChannel.postMessage({ type: "WSState", state: ws.readyState });
ws.onclose = function (event) {
  broadcastChannel.postMessage({ type: "WSState", state: ws.readyState });
}

// When we receive data from the server.
ws.onmessage = ({ data }) => {
  data = JSON.parse(data);
  switch (data.event) {
    case "refuscon":
      idToPortMap["login"].postMessage({ canpass: false, error: data.type , type: "message" });
      break;
    case "autorisationcon":
      idToPortMap["login"].postMessage({ canpass: true ,nom:data.nom,prenom:data.prenom, type: "message" });
      break;
    case "dataFromCar":
      idToPortMap["data"].postMessage({temps:data.temps,consommation:data.consommation,vitesse:data.vitesse, type: "message" });
      break;
    case "userlist":
      idToPortMap["deluser"].postMessage({list:data.list,type:"message"});
      break;
  }

};

onconnect = e => {
  const port = e.ports[0];
  port.onmessage = msg => {
    idToPortMap[msg.data.from] = port;
    if(msg.data.data!=""){
      ws.send(JSON.stringify(msg.data.data));
    }
  };
  port.postMessage({ state: ws.readyState, type: "WSState" });
};