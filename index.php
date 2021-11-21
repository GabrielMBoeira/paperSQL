<?php
require_once('template/header.php')
?>

<main class="main">
    <div class="container">
        <form class="form p-3" action="db/insert.php" method="post">
            <div class="header-form d-flex d-flex justify-content-center align-items-center mt-2">
                <h4><i>Cadastro</i></h4>
            </div>
            <div class="row">
                <div class="mt-2">
                    <div>
                        <label class="form-label form-label">
                            <i>Nome</i>
                        </label>
                        <input type="text" class="form-control" name="nome" placeholder="Digite seu nome..." style="text-transform: uppercase;" autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <label class="form-label form-label">
                    <i>Idade</i>
                </label>
                <input type="text" class="form-control" id="idade" name="idade" placeholder="Digite sua idade..." style="text-transform: uppercase;"  autocomplete="off" required>
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <button class="btn btn-sm btn-primary mt-3  mr-5" name="salvar" >Salvar</button>
            </div>
        </form>
    </div>
</main>

<?php
require_once('template/footer.php')
?>  