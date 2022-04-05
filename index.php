<?php
require_once('template/header.php');
require_once('db/conexao.php');
?>

<main class="main">
    <div class="container">
        <div class="row content">
            <div class="col-lg-6 partition">
                <button class="btn btn-sm btn-outline-danger">Agendar horário</button>
            </div>
            <div class="col-lg-6 partition">
                <button class="btn btn-sm btn-outline-primary">Consultar horário</button>
            </div>
        </div>
        <div class="content-clock">
            <div class="clock">
                <div id="relogio_id"></div>
            </div>
        </div>
    </div>
</main>

<script src="js/function.js"></script>

<?php
require_once('template/footer.php')
?>