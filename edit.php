<?php
require_once('db/conexao.php');
require_once('template/header.php');

session_start();

require_once('db/conexao.php');

$conn = Connection::connectionDB();

$id = addslashes($_GET['id']);

if (is_numeric($id)) {

    $query = "SELECT * FROM registros WHERE id = $id";
    $result = pg_query($query) or die('Error message: ' . pg_last_error());
    $dado = pg_fetch_assoc($result);
    pg_free_result($result);
    pg_close($conn);
}
?>

<main class="main">
    <div class="container">
        <form class="form p-3" id="frm">
            <input type="hidden" name="id" value="<?= $dado['id'] ?>">
            <div class="header-form d-flex d-flex justify-content-center align-items-center mt-2">
                <h4><i>Editar</i></h4>
            </div>
            <div class="row">
                <div class="mt-2">
                    <div>
                        <label class="form-label form-label">
                            <i>Nome</i>
                        </label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome..." value="<?= $dado['nome'] ?>" style="text-transform: uppercase;" autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <label class="form-label form-label">
                    <i>Idade</i>
                </label>
                <input type="number" class="form-control" id="idade" name="idade" placeholder="Digite sua idade..." value="<?= $dado['idade'] ?>" style="text-transform: uppercase;" autocomplete="off" required>
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <button class="btn btn-sm btn-primary mt-3  mr-5" name="salvar" onclick="validaForm()">Salvar</button>
            </div>
        </form>
    </div>
</main>

<script>
    function validaForm() {

        let idade = parseInt(frm.idade.value)

        if (frm.idade.value == "" || frm.nome.value == "") {
            alert('Há campos em branco que devem ser preenchidos!')
            return false

        } else {

            if (idade < 0) {
                alert('Idade não pode ser com número negativo!')
                return false
            } else {
                frm.method = 'post';
                frm.action = 'db/update.php';
                frm.submit();
            }

        }
    }
</script>

<?php
require_once('template/footer.php')
?>