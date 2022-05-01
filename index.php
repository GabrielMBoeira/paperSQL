<?php
// require_once('db/conexao.php');
?>

<div class="cont">
    <!-- Importação de template cabeçaalho -->
    <?php require_once('template/header.php'); ?>
    
    <div class="clock-content">
        <div class="clock" id="clock"></div>
    </div>
    
    <div class="content-center">
        <div class="div1">
            <a href="agendar.php"><button class="btn1">Agendar Horário</button></a>
        </div>
        
        <div class="div2">
        <a href="consultar-hr.php"> <button class="btn2 ">Consultar Horário</button></a>
        </div>
    </div>
    
    <!-- Importação de template rodapé -->
    <?php require_once('template/footer.php') ?>
</div>


<script src="js/function.js"></script>