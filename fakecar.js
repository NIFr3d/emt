var socket = new WebSocket("ws://rostro15.fr:8080");
socket.onopen = function () {

};
var lat = 48.3025;
var lon = 6.9175;

document.getElementById("startsending").onclick = function () {
    var i = 0
    socket.send(JSON.stringify({
        event:"debutrun"
    }))
    while (i < 20) {
        task(i);
        i++;
    }
    function task(i) {
        setTimeout(function () {
            lat=lat+i*0.00001;
            lon=lon+i*0.00001
            infos = {
                event: "dataFromCar",
                consommation: i / 10,
                temps: i,
                latt: lat,
                long: lon,
            }
            document.getElementById("temps").innerHTML = infos.temps;
            document.getElementById("conso").innerHTML = infos.consommation;
            document.getElementById("lat").innerHTML = infos.latt;
            document.getElementById("lon").innerHTML = infos.long;
            socket.send(JSON.stringify(infos));
        }, 1000 * i);

    }


}

