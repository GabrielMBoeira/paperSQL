<?php
session_start();
require_once('conexao.php');

$conn = Connection::connectionDB();

$id = htmlspecialchars($_GET['id']);
$id = mysqli_real_escape_string($conn, $id);
$id = intval($id);

if (isset($id)) {

    $sql = "DELETE FROM cliente WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) { 
        $_SESSION['msg_agenda'] =  "<div class='alert alert-success fs-6' role='alert'>Deletado com sucesso!!!</div>";
        header('location: ../consultar-hr.php');
    } else {
        $_SESSION['msg_agenda'] =  "<div class='alert alert-danger fs-6' role='alert'> Erro ao deletar!!!</div>";
        header('location: ../consultar-hr.php');
    }

    $stmt->close();
    $conn->close();
}
