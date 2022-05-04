<?php
require_once('template/header.php');
?>

<link rel="stylesheet" href="css/style.css">

<main onload="relogio()">
    <div class="content-clock">
        <div class="clock">
            <div class="clock-span m-1">
                <span class="m-1" id="clock"></span>
            </div>
        </div>
    </div>

    <div class="content-center">
        <div class="div1">
            <a href="agendar.php"><button class="btn1">Agendar Horário</button></a>
        </div>

        <div class="div2">
            <a href="consultar-hr.php"><button class="btn2 ">Acessar agenda</button></a>
        </div>
    </div>
</main>

<?php
require_once('template/footer.php');
?>

<script src="js/function.js"></script>

<script src="js/function.js"></script>