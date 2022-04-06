<?php
require_once('template/header.php');
require_once('db/conexao.php');
?>

<div class="cont">
    <div class="clock-content">
        <div class="clock" id="clock"></div>
    </div>
    <div class="div1">
        <button class="btn1">Agendar Horário</button>
    </div>
    <div class="div2">
        <button class="btn2">Consultar Horário</button>
    </div>
</div>


<script src="js/function.js"></script>

<?php
require_once('template/footer.php')
?>