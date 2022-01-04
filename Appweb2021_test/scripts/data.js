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

mapboxgl.accessToken = 'pk.eyJ1IjoibHVjYXNwcmludHoiLCJhIjoiY2t3bTRncHowMHp0ODJ3cGR0ZmV0ankzbCJ9.HVm_k6XdwD4lFQBubqLeqg';
const poscentre=[6.9176, 48.3009];
const poscanvas=0;
const map = new mapboxgl.Map({
    container: 'map', // container ID
    style: 'mapbox://styles/mapbox/light-v10', // style URL
    center: poscentre, // starting position [lng, lat]
    zoom: 15.8 // starting zoom
    });
for(let i=0; i<100;i++){
    const marker = new mapboxgl.Marker();
    setTimeout(function(){
    marker.setLngLat([poscentre[0]+i*0.00001, poscentre[1]+i*0.00001])
    .addTo(map);
    poscanvas=marker.getLngLat();
    },2000*i);
    setTimeout(function(){
    marker.remove();
    },2000*(i+1))
    };
