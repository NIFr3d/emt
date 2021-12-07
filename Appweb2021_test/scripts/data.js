var socket = new WebSocket("ws://localhost:81");
var queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);
if(document.cookie==""){
    location.replace("../pages/login.html");
}

var cookies=document.cookie.split(";");
var userid = cookies[0].split("=")[1];
var prenom=cookies[3].split("=")[1];
var islogged=cookies[4].split("=")[1];
if(islogged!=1){
    location.replace("../pages/login.html");
}

try{
    prenom=decodeURI(prenom); //sert a retransformer les accents
}
catch{
    prenom=unescape(prenom);
}
document.getElementById("prenom").innerHTML = prenom;
socket.onopen = function () {
  socket.onmessage = function (event) {
    data = JSON.parse(event.data);
    switch (data.event) {
      case "dataFromCar":
        document.getElementById("temps").innerHTML = data.temps;
        document.getElementById("vitesse").innerHTML = data.vitesse;
        document.getElementById("conso").innerHTML = data.consommation;
        break;
    }
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