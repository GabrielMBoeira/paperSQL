<?php
require_once('template/header.php');
?>


<link rel="stylesheet" href="css/cad_horario.css">

<main>
    <div class="content-form">
        <form>
            <div class="title-form col-md-12 d-flex justify-content-center align-itens-center fs-2">Cadastrar horário</div>
            <div class="col-md-12 mt-4">
                <label for="data" class="form-label">Data:</label>
                <input type="date" class="form-control" placeholder="Insira uma data...">
            </div>

            <div class="col-md-12 mt-4">
                <label for="horario" class="form-label">Horario:</label>
                <input type="time" class="form-control" placeholder="Insira uma horario...">
            </div>

            <div class="content-button d-flex justify-content-end mt-4">
                <button class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</main>

<?php
require_once('template/footer.php');

?>
