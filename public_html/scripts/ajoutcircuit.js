var token=sessionStorage.getItem("token");
var socket = new WebSocket("ws://emt.polytech-nancy.univ-lorraine.fr:8080/wsapi/?token="+token);
socket.onopen = function () {
    socket.onmessage = function (event) { //On récupère les données envoyées par le serveur
      data = JSON.parse(event.data);
      switch (data.event) {
          case "nbUtilisateurs":
              if(document.getElementById("nbUtilisateurs") != null){
                document.getElementById("nbUtilisateurs").innerHTML = data.nbUti; //On met à jour le nombre d'utilisateurs
              }
              break;
          }
      }
  }
var layer = L.marker();
var lat = sessionStorage.getItem("lat");
var lon = sessionStorage.getItem("lon");
var zoom = sessionStorage.getItem("zoom");
var map = null;
function initMap() {
    // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
    map = L.map('map').setView([lat, lon], zoom);
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
}

const ajoutCircuit = document.getElementById("ajoutCircuit");

ajoutCircuit.addEventListener("click",function(){
    lat = map.getCenter().lat;
    lon = map.getCenter().lng;
    zoom = map.getZoom();
    document.getElementById("lat").value = lat;
    document.getElementById("lon").value = lon;
    document.getElementById("zoom").value = zoom;
    if(document.getElementById("cir").value != ""){
    document.getElementById("form").submit();
    }else{
        alert("Veuillez entrer un nom de circuit");
    }
})