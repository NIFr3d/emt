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
                intensite: i / 10,
                tension: i*10,
                energie:i*100,
                latt: lat,
                long: lon,
            }
            document.getElementById("intensite").innerHTML = infos.intensite;
            document.getElementById("tension").innerHTML = infos.tension;
            document.getElementById("energie").innerHTML = infos.energie;
            document.getElementById("lat").innerHTML = infos.latt;
            document.getElementById("lon").innerHTML = infos.long;
            socket.send(JSON.stringify(infos));
        }, 1000 * i);

    }


}

