<?php
session_start();
require_once('db/conexao.php');
require_once('template/header.php');

$conn = Connection::connectionDB();

$dados = array();

if (isset($_POST['filtrar'])) {

    $filtrar   = htmlspecialchars($_POST['filtrar']);
    $date      = htmlspecialchars($_POST['date']);
    $time      = htmlspecialchars($_POST['time']);

    $filtrar   = mysqli_real_escape_string($conn, $filtrar);
    $date      = mysqli_real_escape_string($conn, $date);
    $time      = mysqli_real_escape_string($conn, $time);

    $sql = "select c.id, a.data, a.horario, c.nome, c.cpf
                from cliente c
                join agenda a
                    on c.fk_agenda_id = a.id
                where a.data = '$date' and a.horario = '$time'";

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $dados[] = $row;
    }

} else {

    $sql = "select c.id, a.data, a.horario, c.nome, c.cpf
                from cliente c
                join agenda a
                    on c.fk_agenda_id = a.id
                order by a.data asc";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $dados[] = $row;
    }

}


?>

<link rel="stylesheet" href="css/consultar-hr.css">

<main>
    <div class="cont-table">
        <form id="frm" method="post" action="consultar-hr.php">
            <?php
            if (isset($_SESSION['msg_agenda'])) {
                print_r($_SESSION['msg_agenda']);
                unset($_SESSION['msg_agenda']);
            }
            ?>
            <div class="back-table">
                <div class="inputs">
                    <input class="ipt1" type="date" name="date" id="date" required>
                    <input class="ipt2" type="time" name="time" id="time" required>
                    <button class="btn btn-primary" name="filtrar">Filtrar</button>
                </div>

                <div class="table-responsive">
                    <table class="table text-light">
                        <thead>
                            <tr>
                                <th scope="col">Data</th>
                                <th scope="col">Hor??rio</th>
                                <th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            if ($dados) {

                                foreach ($dados as $dado) { 

                                    ?>
                                    <tr>
                                        <td valign="middle">
                                            <?php
                                            $dataBr = date('d/m/Y', strtotime($dado['data']));
                                            echo $dataBr;
                                            ?>
                                        </td>
                                        <td valign="middle"><?= $dado['horario'] ?></td>
                                        <td class="text-truncate" valign="middle"><?= $dado['nome'] ?></td>
                                        <td valign="middle" class="text-truncate"><?= $dado['cpf'] ?></td>
                                        <td scope="col">
                                            <a href="editar_agenda.php?id=<?= $dado['id'] ?>" class="btn btn-sm btn-success" valign="middle">Editar</a>
                                        </td>
                                        <td scope="col">
                                            <a href="db/action_delete_cliente.php?id=<?= $dado['id'] ?>" class="btn btn-sm btn-danger" valign="middle">Excluir</a>
                                        </td>
                                    </tr>
                            <?php }
                            } else {

                                print " <tr>
                                            <td  colspan='6'>
                                                <div style='display:flex; flex-direction:column; justify-content:center; align-items:center;'>
                                                    <div style='color:white;'>N??o h?? registros...</div>
                                                    <div style='color:white; margin-top: 20px'>
                                                        <a href='consultar-hr.php' class='btn btn-sm btn-primary' valign='middle'>Voltar para agenda</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </form>
    </div>
</main>

</html>

<?php
require_once('template/footer.php');

?>