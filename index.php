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
            <button class="btn1">teste</button>
        </div>
        
        <div class="div2">
            <button class="btn2 ">Consultar Horário</button>
        </div>
    </div>
    
    <!-- Importação de template rodapé -->
    <?php require_once('template/footer.php') ?>
</div>


<script src="js/function.js"></script>