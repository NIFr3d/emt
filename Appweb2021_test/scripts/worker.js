const ws = new WebSocket("ws://localhost:81");

// Create a broadcast channel to notify about state changes
const broadcastChannel = new BroadcastChannel("WebSocketChannel");

// Mapping to keep track of ports. You can think of ports as
// mediums through we can communicate to and from tabs.
// This is a map from a uuid assigned to each context(tab)
// to its Port. This is needed because Port API does not have
// any identifier we can use to identify messages coming from it.
const idToPortMap = {};

// Let all connected contexts(tabs) know about state cahnges
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
  }

};

// Event handler called when a tab tries to connect to this worker.
onconnect = e => {
  // Get the MessagePort from the event. This will be the
  // communication channel between SharedWorker and the Tab
  const port = e.ports[0];
  port.onmessage = msg => {
    idToPortMap[msg.data.from] = port;
    if(msg.data.data!=""){
      ws.send(JSON.stringify(msg.data.data));
    }
  };
  port.postMessage({ state: ws.readyState, type: "WSState" });
};