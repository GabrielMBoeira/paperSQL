<?php
session_start();

require_once('template/header.php');
require_once('db/conexao.php');

$conn = Connection::connectionDB();

$query = "
        select r.id, r.nome, r.idade, c.nome as cidade from registros r
        join cidades c
        on r.id_cidade = c.id
        ORDER BY r.id DESC    
        ";

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
                        <th scope="col"><i>Nome</i></th>
                        <th scope="col"><i>Idade</i></th>
                        <th scope="col"><i>Cidade</i></th>
                        <th scope="col"><i>Editar</i></th>
                        <th scope="col"><i>Deletar</i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados as $dado) { ?>
                        <tr>
                            <td class="dado" scope="row" style=" vertical-align: middle;"><?= $dado['id'] ?></td>
                            <td class="text-truncate dado" style=" vertical-align: middle;"><?= strtoupper($dado['nome']) ?></td>
                            <td class="text-truncate dado" style=" vertical-align: middle;"><?= $dado['idade'] ?></td>
                            <td class="text-truncate dado" style=" vertical-align: middle;"><?= $dado['cidade'] ?></td>
                            <td>
                                <a href="edit.php?id=<?= $dado['id']  ?>" class="btn btn-sm btn-success" style=" vertical-align: middle;">Editar</a>
                            </td>
                            <td>
                                <a href="db/delete.php?id=<?= $dado['id'] ?>" name="deletar" class="btn btn-sm btn-danger" style=" vertical-align: middle;">Deletar</a>
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