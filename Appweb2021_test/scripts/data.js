var socket = new WebSocket("ws://localhost:81");
var queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);
var userid = urlParams.get('userid');
sessionStorage.setItem("userid",userid);
socket.onopen = function () {
    toSend={
        event:"connexionEntrant",
        userid:userid
        }
    socket.send(JSON.stringify(toSend));
  };
  socket.onmessage = function (event) {
    data = JSON.parse(event.data);
    switch (data.event) {
      case "connexion":
        document.getElementById("prenom").innerHTML = data.prenom;
        break;
      case "dataFromCar":
        document.getElementById("temps").innerHTML = data.temps;
        document.getElementById("vitesse").innerHTML = data.vitesse;
        document.getElementById("conso").innerHTML = data.consommation;
        break;
    }
}
var canevas = document.getElementById("canevas");
contexte = canevas.getContext("2d");
var flipflop = true;
const envoitracer = document.getElementById('envoitracer');
canevas.addEventListener('mousedown', function (e) {
    var rect = e.target.getBoundingClientRect();
    var x = e.clientX - rect.left; //x position within the element.
    var y = e.clientY - rect.top;  //y position within the element
    canevas.oncontextmenu = function (e) { e.preventDefault(); e.stopPropagation(); }
    switch (e.button) {
        case 2:                //clic droit
            flipflop = true;
            break;

        case 0:                //clic gauche
            if (flipflop) {
                contexte.beginPath();
                contexte.moveTo(x, y);
                flipflop = false;
            }
            else {
                contexte.lineTo(x, y);
                contexte.stroke();
            }
            break;

        default:
            console.log('Pas un clic');
    }
});
envoitracer.addEventListener('click', function (e) {
    toSend = {
        event: "nouveautracer",
        imageurl: canevas.toDataURL()
    }
    socket.send(JSON.stringify(toSend));
});