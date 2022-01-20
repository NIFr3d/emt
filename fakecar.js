var socket = new WebSocket("ws://rostro15.fr:8080");
socket.onopen = function () {

};
var lat = 43.77020;
var lon = -0.04083;
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
                latt: lat,
                long: lon,
            }
            document.getElementById("conso").innerHTML = infos.consommation;
            document.getElementById("lat").innerHTML = infos.latt;
            document.getElementById("lon").innerHTML = infos.long;
            socket.send(JSON.stringify(infos));
        }, 1000 * i);

    }


}

