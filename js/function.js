function relogio() {
    let data = new Date();
    let tempo = document.getElementById("clock");

    tempo.innerHTML = data.toLocaleTimeString();
}

setInterval(relogio, 1000);