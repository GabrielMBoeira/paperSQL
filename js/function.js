function relogio() {
    let data = new Date();
    let hr = data.getHours();
    let min = data.getMinutes();
    let seg = data.getSeconds();

    let horaTotal = hr + ":" + min + ":" + seg;
    let tempo = document.getElementById("relogio_id");

    tempo.innerHTML = horaTotal;
}

setInterval(relogio, 1000);