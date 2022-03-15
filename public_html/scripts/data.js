var socket = new WebSocket("ws://193.55.243.241:8080");
var layer = L.marker();

var acces=sessionStorage.getItem("acces");
socket.onopen = function () {
  socket.onmessage = function (event) {
    data = JSON.parse(event.data);
    switch (data.event) {
        case "dataFromCar":
            layer.remove();
            document.getElementById("temps").innerHTML = data.temps;
            document.getElementById("vitesse").innerHTML = data.vitesse;
            document.getElementById("intensite").innerHTML = data.intensite;
            document.getElementById("tension").innerHTML = data.tension;
            document.getElementById("energie").innerHTML = data.energie;
            layer = L.marker([data.latt,data.long]).addTo(map);
            break;
        case "fromStrategy":
            if(acces==2 || acces==1){
                document.getElementById("jsp").innerHTML=data.jsp;
            }
            break;
        }
    }
    
}
var canevas = document.getElementById("canevas");
contexte = canevas.getContext("2d");
var flipflop = true;
const envoitracer = document.getElementById('envoitracer');
var img = document.createElement("img");
img.src ="../Cartes/out.png?" + new Date().getTime();
img.onload=function(){
    contexte.drawImage(img, 0, 0);
};

if(acces==1 || acces==2){
    document.getElementById('cleartracer').addEventListener('click',function(){
        contexte.clearRect(0, 0, canevas.width, canevas.height);
        flipflop = true;
    });
    canevas.addEventListener('click', function (e) {
        var rect = e.target.getBoundingClientRect();
        var x = e.clientX - rect.left; //x position within the element.
        var y = e.clientY - rect.top;  //y position within the element
        canevas.oncontextmenu = function (e) { e.preventDefault(); e.stopPropagation(); }
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
    });
    canevas.addEventListener('mousedown', function(e){
        if(e.button==2){      //clic droit
            flipflop=true;
        }
    })
    envoitracer.addEventListener('click', function (e) {
        toSend = {
            event: "nouveautracer",
            imageurl: canevas.toDataURL()
        }
        socket.send(JSON.stringify(toSend));
    });
    
};

var lat = 43.77020;
var lon = -0.04083;
var map = null;

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
}
window.onload = function(){    
    // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
    initMap(); 
    var url = window.location.search.substr(1).split("&");
    if(url!=''){
        var coord={};
        for(var i=0; i < url.length; i++){
            var temp = url[i].split("=");
            coord[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
        }
        layer = L.marker([coord['latitude'],coord['longitude']]).addTo(map);
    }

};

