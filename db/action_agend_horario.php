<?php
session_start();
require_once('conexao.php');
require_once("functions/functions.php");

$conn = Connection::connectionDB();

$data = htmlspecialchars($_POST['data']);
$hora = htmlspecialchars($_POST['hora']);
$nome = htmlspecialchars($_POST['nome']);
$cpf  = htmlspecialchars($_POST['cpf']);

$data = mysqli_real_escape_string($conn, $data);
$hora = mysqli_real_escape_string($conn, $hora);
$nome = mysqli_real_escape_string($conn, $nome);
$cpf  = mysqli_real_escape_string($conn, $cpf);

$idAgenda = getIdAgenda($data, $hora);
$idAgenda = $idAgenda['id'];

if (isset($_POST['salvar'])) {

    $sql = "INSERT INTO cliente (nome, cpf, fk_agenda_id) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $nome, $cpf, $idAgenda);
    

    if ($stmt->execute()) { 
        $_SESSION['msg_agend_horario'] =  "<div class='alert alert-success fs-6' role='alert'>Cliente cadastrado!!!</div>";
        header('location: ../agendar.php');
    } else {
        $_SESSION['msg_agend_horario'] =  "<div class='alert alert-danger fs-6' role='alert'> Erro ao cadastrar!!!</div>";
        header('location: ../agendar.php');
    }

    $stmt->close();
    $conn->close();
}
