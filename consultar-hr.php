<?php
session_start();
require_once('db/conexao.php');
require_once('template/header.php');

$conn = Connection::connectionDB();


// if (isset($_POST['filtrar'])) {

//     // $filtrar   = htmlspecialchars($_POST['filtrar']);
//     // $date   = htmlspecialchars($_POST['date']);
//     // $time = htmlspecialchars($_POST['time']);

//     // $filtrar   = mysqli_real_escape_string($conn, $filtrar);
//     // $date   = mysqli_real_escape_string($conn, $date);
//     // $time = mysqli_real_escape_string($conn, $time);

//     // // string(10) "2022-05-04"
//     // // string(5) "01:40"

//     // $sql = "select c.id, a.data, a.horario, c.nome, c.cpf
//     //             from cliente c
//     //             join agenda a
//     //                 on c.fk_agenda_id = a.id
//     //             where a.data = ?
//     //             and a.horario = ?";

//     // $stmt = $conn->prepare($sql);
//     // $stmt->bind_param('ss', $date, $time);
//     // $stmt = $conn->prepare($sql);

//     // $stmt->execute();
//     // $result = $stmt->get_result();

// } else {

    $sql = "select c.id, a.data, a.horario, c.nome, c.cpf
            from cliente c
            join agenda a
                on c.fk_agenda_id = a.id
            order by a.data asc";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
// }

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
                                <th scope="col">Horário</th>
                                <th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <th valign="middle">
                                        <?php
                                        $dataBr = date('d/m/Y', strtotime($row['data']));
                                        echo $dataBr;
                                        ?>
                                    </th>
                                    <td valign="middle"><?= $row['horario'] ?></td>
                                    <td class="text-truncate" valign="middle"><?= $row['nome'] ?></td>
                                    <td valign="middle"><?= $row['cpf'] ?></td>
                                    <th scope="col">
                                        <a href="editar_agenda.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-success" valign="middle">Editar</a>
                                    </th>
                                    <th scope="col">
                                        <a href="db/action_delete_cliente.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" valign="middle">Excluir</a>
                                    </th>
                                </tr>
                            <?php  } ?>
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