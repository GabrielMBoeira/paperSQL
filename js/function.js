function relogio() {
    let data = new Date();
    let tempo = document.getElementById("relogio_id");

    tempo.innerHTML = data.toLocaleTimeString();
}

setInterval(relogio, 1000);