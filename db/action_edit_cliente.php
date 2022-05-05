<?php
session_start();
require_once('conexao.php');
require_once("functions/functions.php");

$conn = Connection::connectionDB();

$id   = htmlspecialchars($_POST['id']);
$data = htmlspecialchars($_POST['data']);
$hora = htmlspecialchars($_POST['hora']);
$nome = htmlspecialchars($_POST['nome']);
$cpf  = htmlspecialchars($_POST['cpf']);

$id   = mysqli_real_escape_string($conn, $id);
$data = mysqli_real_escape_string($conn, $data);
$hora = mysqli_real_escape_string($conn, $hora);
$nome = mysqli_real_escape_string($conn, strtoupper($nome));
$cpf  = mysqli_real_escape_string($conn, $cpf);

$idAgenda = getIdAgenda($data, $hora);
$idAgenda = $idAgenda['id'];

if (isset($id)) {

    $sql = "UPDATE cliente SET nome = ?, cpf = ?, fk_agenda_id = ? WHERE id = ?  ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssii', $nome, $cpf, $idAgenda, $id);

    if ($stmt->execute()) {
        $_SESSION['msg_agenda'] =  "<div class='alert alert-success fs-6' role='alert'>Editado com sucesso!!!</div>";
        header('location: ../consultar-hr.php');
    } else {
        $_SESSION['msg_agenda'] =  "<div class='alert alert-danger fs-6' role='alert'> Erro ao editar!!!</div>";
        header('location: ../consultar-hr.php');
    }

    $stmt->close();
    $conn->close();
}
