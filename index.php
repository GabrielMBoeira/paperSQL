<?php
require_once('template/header.php');
require_once('db/conexao.php');
?>

<main class="main">
    <div class="container">
        <div class="row content">
            <div class="col-md-6 partition">
                <button class="btn btn-danger m-1">Agendar horário</button>
            </div>
            <div class="col-md-6 partition">
                <button class="btn btn-primary m-1">Consultar horário</button>
            </div>

            <div class="content-clock">
                <div class="clock">
                    <div id="relogio_id"></div>
                </div>
            </div>

        </div>
    </div>
</main>

<script src="js/function.js"></script>

<?php
require_once('template/footer.php')
?>