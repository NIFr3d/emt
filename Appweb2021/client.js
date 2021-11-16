let socket = new WebSocket("ws://localhost:81");
var data;
const queryString=window.location.search;
const urlParams = new URLSearchParams(queryString);
const loginfos={userid:urlParams.get("login"),mdp:urlParams.get("mdp")};


  socket.onopen = function() {
    socket.send(JSON.stringify(loginfos));
  };
  
  socket.onmessage = function(event) {
    data = JSON.parse(event.data);
    if (data.event=="connexion"){
      document.getElementById("prenom").innerHTML = data.prenom;
      document.getElementById("temps").innerHTML = data.temps;
      document.getElementById("vitesse").innerHTML = data.vitesse;
      document.getElementById("conso").innerHTML = data.consommation;
      var acces=data.acces;
      if (acces==1) {
        document.getElementById("adduser").style.display="block";
      }
      else {
        document.getElementById("adduser").style.display="none";
      }
    }
  };
  
  socket.onclose = function(event) {
    if (event.wasClean) {
      if (event.code==4001 || event.code==4002) {
        alert(event.reason);
        window.location.replace("login.html");
      }
    }
  };
  
  socket.onerror = function(error) {
    alert(`[error] ${error.message}`);
  };
