var socket = new WebSocket("ws://rostro15.fr:8080");
socket.onopen = function () {
    socket.onmessage = function (event) {
      data = JSON.parse(event.data);
      console.dir(data);
      switch (data.event) {
          case "nbUtilisateurs":
              document.getElementById("nbUtilisateurs").innerHTML = data.nbUti;
              break;
          }
      }
      
  }