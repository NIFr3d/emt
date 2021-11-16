let socket = new WebSocket("ws://localhost:81");
var data;

socket.onopen = function() {
    alert("[open] Connection established");
    alert("Sending to server");
    socket.send(JSON.stringify({"userid":"fre1","mdp":"test"})); //à changer pour vérifier si l'accès est autorisé
  };
  
  socket.onmessage = function(event) {
    data = JSON.parse(event.data);
    var datas=data.split(";");
    for(var i=0;i<3;i++){
      document.getElementById(i).innerHTML = datas[i];
    };
  };
  
  socket.onclose = function(event) {
    if (event.wasClean) {
      if (event.code==1005) alert("Identifiant ou mot de passe incorrect")
      else alert(`[close] Connection closed cleanly, code=${event.code} reason=${event.reason}`);
    } else {

      alert('[close] Connection died');
    }
  };
  
  socket.onerror = function(error) {
    alert(`[error] ${error.message}`);
  };