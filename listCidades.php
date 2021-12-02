<?php
session_start();

require_once('template/header.php');
require_once('db/conexao.php');

$conn = Connection::connectionDB();

$query = 'SELECT * FROM cidades ORDER BY nome ASC';
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
            <table class="table table-striped table-responsive text-light">
                <thead>
                    <tr>
                        <th scope="col"><i>ID</i></th>
                        <th scope="col"><i>Cidade</i></th>
                        <th scope="col"><i>Deletar</i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados as $dado) { ?>
                        <tr>
                            <td class="dado" scope="row" style=" vertical-align: middle;"><?= $dado['id'] ?></td>
                            <td class="text-truncate dado" style=" vertical-align: middle;"><?= strtoupper($dado['nome']) ?></td>
                            <td>
                                <a href="db/deleteCidade.php?id=<?= $dado['id'] ?>" name="deletar" class="btn btn-sm btn-danger" style=" vertical-align: middle;">Deletar</a>
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