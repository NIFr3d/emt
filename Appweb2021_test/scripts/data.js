var socket = new WebSocket("ws://localhost:81");

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
                contexte.strokeStyle="#FF281F";
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

// On initialise la latitude et la longitude de Paris (centre de la carte)
var lat = 48.852969;
var lon = 2.349903;
var macarte = null;
// Fonction d'initialisation de la carte
function initMap() {
    // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
    macarte = L.map('map').setView([lat, lon], 11);
    // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        // Il est toujours bien de laisser le lien vers la source des données
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20
    }).addTo(macarte);
}
window.onload = function(){
// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
initMap(); 
};
