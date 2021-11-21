<?php
session_start();

require_once('conexao.php');

if (isset($_GET['id'])) {


    //POSTGRESQL
    $id = addslashes($_GET['id']);

    if (is_numeric($id)) {

        $query = "DELETE FROM registros WHERE id = $id";

        $conn = Connection::connectionDB();

        if (pg_query($query)) {
            $_SESSION['mensagem'] = '<div class="alert alert-primary" role="alert">Registro deletado com sucesso!</div>';
            header('location: ../list.php');
        } else {
            $_SESSION['mensagem'] = '<div class="alert alert-danger" role="alert">Erro ao deletar registro!</div>';
            header('location: ../list.php');
        }

        pg_close();
    }

    //MYSQL
    // $conn = conexao();

    // $id = mysqli_real_escape_string($conn, trim($_POST['id']));

    // $id = htmlspecialchars($id);

    // $sql = "DELETE FROM registros WHERE id = ?";

    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param('i', $id);

    // if ($stmt->execute()) {
    //     $_SESSION['mensagem'] = '<div class="alert alert-primary" role="alert">Registro deletado com sucesso!</div>';
    //     header('location: ../list.php');
    // } else {
    //     $_SESSION['mensagem'] = '<div class="alert alert-danger" role="alert">Erro ao deletar!</div>';
    //     header('location: ../list.php');
    // }

    // $conn->close();
}
