var token=sessionStorage.getItem("token");
var socket = new WebSocket("ws://emt.polytech-nancy.univ-lorraine.fr:8080/wsapi/?token="+token);
socket.onopen = function () {
    socket.onmessage = function (event) {
      data = JSON.parse(event.data);
      switch (data.event) {
          case "nbUtilisateurs":
              if(document.getElementById("nbUtilisateurs") != null){
                document.getElementById("nbUtilisateurs").innerHTML = data.nbUti;
              }
              break;
          }
      }
  }