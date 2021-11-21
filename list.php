<?php
session_start();

require_once('template/header.php');
require_once('db/conexao.php');

$conn = Connection::connectionDB();

$query = 'SELECT * FROM registros ORDER BY id DESC';
$result = pg_query($query) or die('Error message: ' . pg_last_error());

$dados = array();

while ($row = pg_fetch_assoc($result)) {
    $dados[] = $row;
}

pg_free_result($result);
pg_close($conn);

?>

<main class="main">
    <div class="p-3">
        <div class="mensagem d-flex justify-content-center align-items-center mb-3">
            <?php
            if (isset($_SESSION['mensagem'])) {
                print_r($_SESSION['mensagem']);
                unset($_SESSION['mensagem']);
            }
            ?>
        </div>
        <div class="table-content table-scrollable">
            <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th scope="col"><i>ID</i></th>
                        <th scope="col"><i>Nome</i></th>
                        <th scope="col"><i>Idade</i></th>
                        <th scope="col"><i>Editar</i></th>
                        <th scope="col"><i>Deletar</i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados as $dado) { ?>
                        <tr>
                            <td scope="row"><?= $dado['id'] ?></td>
                            <td class="text-truncate"><?= strtoupper($dado['nome']) ?></td>
                            <td class="text-truncate"><?= $dado['idade'] ?></td>
                            <td>
                                <a href="edit.php?id=<?= $dado['id']  ?>" class="btn btn-sm btn-success">Editar</a>
                            </td>
                            <td>
                                <a href="db/delete.php?id=<?= $dado['id'] ?>" name="deletar" class="btn btn-sm btn-danger">Deletar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>



<?php
require_once('template/footer.php')
?>