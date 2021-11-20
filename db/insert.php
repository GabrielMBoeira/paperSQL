<?php
session_start();

require_once('conexao.php');

if (isset($_POST['salvar'])) {

    $conn = conexao();

    $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $idade = mysqli_real_escape_string($conn, trim($_POST['idade']));

    $nome = htmlspecialchars($nome);
    $idade = htmlspecialchars($idade);

    $sql = "INSERT INTO registros (nome, idade) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $nome, $idade);

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = '<div class="alert alert-primary" role="alert">Registro inserido com sucesso!</div>';
        header('location: ../list.php');
    } else {
        $_SESSION['mensagem'] = '<div class="alert alert-danger" role="alert">Erro ao inserir!</div>';
        header('location: ../list.php');
    }

    $conn->close();
}
