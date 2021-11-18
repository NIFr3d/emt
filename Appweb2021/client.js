let socket; 
var data;
var loginfos;
document.getElementById("loginbutton").onclick=function(){
      loginfos={event:"connexionEntrant",
                userid:document.getElementById("login").value,
                mdp:document.getElementById("mdp").value
              };
      socket= new WebSocket("ws://localhost:81");
      socket.onopen = function() {
        socket.send(JSON.stringify(loginfos));
      };
    


  
  
  socket.onmessage = function(event) {
    data = JSON.parse(event.data);
    if (data.event=="connexion"){
      document.getElementById("connexion").style.display="none";
      document.getElementById("data").style.display="block";
      document.getElementById("prenom").innerHTML = data.prenom;
      document.getElementById("temps").innerHTML = data.temps;
      document.getElementById("vitesse").innerHTML = data.vitesse;
      document.getElementById("conso").innerHTML = data.consommation;
      var acces=data.acces;
      if (acces==1) {
        document.getElementById("adduser").style.display="block";
      }
    }
  };
  
  socket.onclose = function(event) {
    if (event.wasClean) {
      if (event.code==4001 || event.code==4002) {
        alert(event.reason);
        window.location.replace("main.html");
      }
    }
  };
  
  socket.onerror = function(error) {
    console.dir(error)
  };

document.getElementById("adduserbutton").onclick=function(){
  toSend={
    event:"adduser",
    userid:document.getElementById("login1").value,
    nom:document.getElementById("nom").value,
    prenom:document.getElementById("prenom").value,
    mdp:document.getElementById("mdp1").value,
    acces:document.getElementById("acces").value,
  }
  
  socket.send(JSON.stringify(toSend));
}
}