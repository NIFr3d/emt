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
var acces=sessionStorage.getItem("acces");
var img = document.createElement("img");
img.src ="../Cartes/out.png";
contexte.drawImage(img, 0, 0);
if(acces==1){
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
                    contexte.strokeStyle="#019cde";
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
    
}


var lat = 48.3025;
var lon = 6.9175;
var map = null;
var layer = null;


// Fonction d'initialisation de la carte
function initMap() {
    // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
    map = L.map('map').setView([lat, lon], 16);
    // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        // Il est toujours bien de laisser le lien vers la source des données
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20
    }).addTo(map);
for(let i=0; i<100;i++){
    var layer = L.marker();
    setTimeout(function(){
        layer = L.marker([lat+i*0.00001,lon+i*0.00001]).addTo(map).bindPopup("Voiture ici").openPopup();
    },500*i)
    setTimeout(function(){
        layer.remove();
    },500*(i+1));

}
}
window.onload = function(){
// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
initMap(); 
};
