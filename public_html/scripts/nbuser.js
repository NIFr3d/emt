var token=sessionStorage.getItem("token");
var socket = new WebSocket("ws://193.55.243.241:8080/wsapi/?token="+token);
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