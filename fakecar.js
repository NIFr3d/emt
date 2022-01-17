
socket = new WebSocket("ws://localhost:81");
socket.onopen = function () {

};

document.getElementById("startsending").onclick = function () {
    var i = 0
    while (i < 20) {
        task(i);
        i++;
    }
    function task(i) {
        setTimeout(function () {
            infos = {
                event: "dataFromCar",
                vitesse: i * 12,
                consommation: i / 10,
                temps: i
            }
            document.getElementById("temps").innerHTML = infos.temps;
            document.getElementById("vitesse").innerHTML = infos.vitesse;
            document.getElementById("conso").innerHTML = infos.consommation;
            socket.send(JSON.stringify(infos));
        }, 1000 * i);

    }


}

