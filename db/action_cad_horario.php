<?php
session_start();
require_once('conexao.php');

$conn = Connection::connectionDB();

$data    = htmlspecialchars($_POST['data']);
$horario = htmlspecialchars($_POST['horario']);

$data    = mysqli_real_escape_string($conn, $data);
$horario = mysqli_real_escape_string($conn, $horario);

if (isset($_POST['salvar'])) {

    $sql = "INSERT INTO agenda (data, horario) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $data, $horario);


    if ($stmt->execute()) { 
        $_SESSION['cad_horario'] =  "<div class='alert alert-success fs-6' role='alert'> Horário cadastrado!!!</div>";
        header('location: ../cad_horario.php');
    } else {
        $_SESSION['cad_horario'] =  "<div class='alert alert-danger fs-6' role='alert'> Erro ao cadastrar!!!</div>";
        header('location: ../cad_horario.php');
    }

    $stmt->close();
    $conn->close();
}
