<?php
require_once('template/header.php');
?>

<link rel="stylesheet" href="css/agend_horario.css">

<main>
    <div class="content-form">
        <form class="row g-3">
            <div class="title-form col-md-12 d-flex justify-content-center align-itens-center fs-2">Agendar cliente</div>
            <div class="col-md-6">
                <label for="data" class="form-label">Data:</label>
                <select id="data" class="form-select">
                    <option selected>Escolha uma data</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="hora" class="form-label">Hora:</label>
                <select id="hora" class="form-select">
                    <option selected>Escolha um horário</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-12">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="Digite seu nome">
            </div>
            <div class="col-8">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" size="14" maxlength="14"  class="form-control" id="cpf"  placeholder="Digite seu CPF" onkeypress="mascara_cpf()">
            </div>
            <div class="content-button d-flex justify-content-end">
                <button class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</main>


<?php
require_once('template/footer.php');
?>
