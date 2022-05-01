<?php
require_once('template/header.php');
?>

<link rel="stylesheet" href="css/style.css">

<main onload="relogio()">
    <div class="content-clock">
        <div class="clock" id="clock"></div>
    </div>

    <div class="content-center">
        <div class="div1">
            <a href="agendar.php"><button class="btn1">Agendar Horárioz</button></a>
        </div>

        <div class="div2">
        <a href="consultar-hr.php"> <button class="btn2 ">Consultar Horário</button></a>
        </div>
    </div>
</main>
    
<?php
require_once('template/footer.php');
?>

<script src="js/function.js"></script>

<script src="js/function.js"></script>
