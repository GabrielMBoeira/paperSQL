<?php
session_start();
require_once('template/header.php')
?>

<main class="main">
    <div class="container">
        <form class="form p-3" id="frm">
            <div class="header-form d-flex d-flex justify-content-center align-items-center mt-2">
                <h4><i>Cadastrar de cidade</i></h4>
            </div>
            <div class="row">
                <div class="mt-2">
                    <div>
                        <label class="form-label form-label">
                            <i>Nome da cidade</i>
                        </label>
                        <input type="text" class="form-control" name="nomeCidade" placeholder="Digite sua cidade..." style="text-transform: uppercase;" autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <button class="btn btn-sm btn-primary mt-3  mr-5" name="salvar" onclick="validaForm()">Salvar</button>
            </div>
        </form>
    </div>
</main>

<script>
    function validaForm() {
        frm.method = 'post';
        frm.action = 'db/insertCidade.php';
        frm.submit();

    }
</script>

<?php
require_once('template/footer.php')
?>