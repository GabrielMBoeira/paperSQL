<?php
session_start();

require_once('conexao.php');


if (isset($_GET['id'])) {

    $conn = conexao();

    $id = mysqli_real_escape_string($conn, trim($_GET['id']));

    $sql = "DELETE FROM registros WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = '<div class="alert alert-primary" role="alert">Registro deletado com sucesso!</div>';
        header('location: ../list.php');
    } else {
        $_SESSION['mensagem'] = '<div class="alert alert-danger" role="alert">Erro ao deletar!</div>';
        header('location: ../list.php');
    }

    $conn->close();
}
