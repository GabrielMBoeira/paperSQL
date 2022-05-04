<?php
session_start();
require_once('template/header.php');
?>

<link rel="stylesheet" href="css/cad_horario.css">

<main>
    <div class="content-form">
        <?php
            if (isset($_SESSION['cad_horario'])) {
                print_r($_SESSION['cad_horario']);
                unset($_SESSION['cad_horario']);
            }
        ?>
        <form id="frm"  method="post">
            <div class="title-form col-md-12 d-flex justify-content-center align-itens-center fs-2">Criar Agenda</div>
            <div class="col-md-12 mt-4">
                <label for="data" class="form-label">Data:</label>
                <input type="date" class="form-control" name="data" id="data" placeholder="Insira uma data...">
            </div>

            <div class="col-md-12 mt-4">
                <label for="horario" class="form-label">Horario:</label>
                <input type="time" class="form-control" name="horario" id="horario" placeholder="Insira uma horario...">
            </div>

            <div class="content-button d-flex justify-content-end mt-4">
                <button class="btn btn-primary" name="salvar" onclick="return validarForm()">Salvar</button>
            </div>
        </form>
    </div>
</main>

<?php
require_once('template/footer.php');
?>

<script>
    function validarForm() {
        let frm = document.getElementById("frm");
        let data = document.getElementById("data");
        let horario = document.getElementById("horario");

        if (data.value == "") {
            alert('Insira uma data')
            data.focus()
            return false;
        }

        if (horario.value == "") {
            alert('Selecione um horário')
            horario.focus()
            return false;
        }
        
        frm.method = "post"
        frm.action = "db/action_cad_horario.php"
        frm.submit()

    }
</script>
