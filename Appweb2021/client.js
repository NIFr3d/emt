let socket; 
var data;
var loginfos;

if (sessionStorage.length==0){
      document.getElementById("connexion").style.display="block";
      document.getElementById("loginbutton").onclick=function(){
      loginfos={event:"connexionEntrant",
                userid:document.getElementById("login").value,
                mdp:document.getElementById("mdp").value
              };
      sessionStorage.setItem("userid",loginfos.userid);
      sessionStorage.setItem("mdp",loginfos.mdp);
      StartWebSocket(loginfos);
      }
} else {
  loginfos={event:"connexionEntrant",
            userid:sessionStorage.getItem("userid"),
            mdp:sessionStorage.getItem("mdp")
          };
  StartWebSocket(loginfos);
}
    

function StartWebSocket(logs){
  socket= new WebSocket("ws://localhost:81");
  socket.onopen = function() {
    socket.send(JSON.stringify(loginfos));
  };
  socket.onmessage = function(event) {
    data = JSON.parse(event.data);
    if (data.event=="connexion"){
      document.getElementById("connexion").style.display="none";
      document.getElementById("data").style.display="block";
      document.getElementById("nav").style.display="inline-block";
      document.getElementById("prenom").innerHTML = data.prenom;
      document.getElementById("temps").innerHTML = data.temps;
      document.getElementById("vitesse").innerHTML = data.vitesse;
      document.getElementById("conso").innerHTML = data.consommation;
      var acces=data.acces;
      if (acces==1) {
        document.getElementById("addusermenu").style.display="inline-block";
      }
    }
    if (data.event=="dataFromCar"){
      document.getElementById("temps").innerHTML = data.temps;
      document.getElementById("vitesse").innerHTML = data.vitesse;
      document.getElementById("conso").innerHTML = data.consommation;
    }
  };
  
  socket.onclose = function(event) {
    if (event.wasClean) {
      if (event.code==4001){ 
        document.getElementById("loginerror").style.display="block";
        document.getElementById("mdperror").style.display="none";
        sessionStorage.clear();
      }
      if (event.code==4002) {
        document.getElementById("mdperror").style.display="block";
        document.getElementById("loginerror").style.display="none";
        sessionStorage.clear();
      }
    }
  };
  
  socket.onerror = function(error) {
    console.dir(error)
  };
  document.getElementById("addusermenu").onclick=function(){ //bouton menu d'ajout d'utilisateur
    document.getElementById("adduser").style.display="block";
    document.getElementById("data").style.display="none";
  }
  document.getElementById("mainmenu").onclick=function(){ //bouton accueil
    document.getElementById("adduser").style.display="none";
    document.getElementById("data").style.display="block";
  }
  document.getElementById("logout").onclick=function(){ //bouton déconnexion
    sessionStorage.clear();
    window.location.replace("main.html");
  }
  document.getElementById("adduserbutton").onclick=function(){ //ajout d'utilisateur
    toSend={
      event:"adduser",
      userid:document.getElementById("login1").value,
      nom:document.getElementById("nom1").value,
      prenom:document.getElementById("prenom1").value,
      mdp:document.getElementById("mdp1").value,
      acces:document.getElementById("acces1").value,
    }
    if(toSend.userid!="" && toSend.nom!="" && toSend.prenom!="" && toSend.mdp!="" && toSend.acces!=""){ //on vérifie qu'aucun champ n'est vide
      socket.send(JSON.stringify(toSend));
      document.getElementById("addusererror").style.display="none";
      document.getElementById("addusersuccess").style.display="block";
    }
    else{ //on affiche une erreure si les champs ont été mal remplis
      document.getElementById("addusererror").style.display="block";
      document.getElementById("addusersuccess").style.display="none";
    }
  }
}

