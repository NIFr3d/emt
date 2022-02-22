var socket = new WebSocket("ws://rostro15.fr:8080");
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