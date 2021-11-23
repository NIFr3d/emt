var socket; 
var data;
var loginfos;
var lastuserlistlength=0;
var userlist;

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
    switch (data.event){
    case "connexion":
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
        document.getElementById("removeusermenu").style.display="inline-block";
      }
    case "dataFromCar":
      document.getElementById("temps").innerHTML = data.temps;
      document.getElementById("vitesse").innerHTML = data.vitesse;
      document.getElementById("conso").innerHTML = data.consommation;
    
    case "userlist":
      tableau=document.getElementById("userlist"); //on vide le tableau avant de le remplir avec la liste actuelle
      console.log(lastuserlistlength)
      if(lastuserlistlength!=0){
        for (var i=0;i<lastuserlistlength+1;i++){
          tableau.deleteRow(-1);
        }
      }
      userlist=data.list;
      for(var i=0;i<userlist.length;i++){
        var nomtemp = userlist[i].nom;
        var prenomtemp = userlist[i].prenom;
        var useridtemp = userlist[i].userid;
        var tableRef = document.getElementById("userlist").getElementsByTagName("tbody")[0];
        var newRow = tableRef.insertRow(tableRef.rows.length);
        newRow.innerHTML = "<td>"+nomtemp+"</td>"+"<td>"+prenomtemp+"</td>"+"<td>"+useridtemp+"</td>"+'<button type="button" id="suppuser'+i+'">Supprimer</button>';
        lastuserlistlength=i
      }
      function buttonclickdeluser(i){ //obligé de créer une fonction a cause de boucle for
        return function(){
          console.log(userlist[i].userid);
            toSend={
              event:"deluser",
              userid:userlist[i].userid
            }
            socket.send(JSON.stringify(toSend));
        }
      }
      for(var i=0;i<userlist.length;i++){
        document.getElementById("suppuser"+i).onclick=buttonclickdeluser(i);
      }
    }
  }

  
  socket.onclose = function(event) {
    if (event.wasClean) {
      switch (event.code){
      case 4001 :
        document.getElementById("loginerror").style.display="block";
        document.getElementById("mdperror").style.display="none";
        sessionStorage.clear();
      case 4002 :
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
    document.getElementById("removeuser").style.display="none";
  }
  document.getElementById("mainmenu").onclick=function(){ //bouton accueil
    document.getElementById("adduser").style.display="none";
    document.getElementById("data").style.display="block";
    document.getElementById("removeuser").style.display="none";
  }
  document.getElementById("removeusermenu").onclick=function(){ //bouton suppression d'utilisateur
    document.getElementById("adduser").style.display="none";
    document.getElementById("data").style.display="none";
    document.getElementById("removeuser").style.display="block";
    toSend={
      event:"getuserlist"
    }
    socket.send(JSON.stringify(toSend))
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
  
