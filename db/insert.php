<?php
session_start();

require_once('conexao.php');

$nome = $_POST['nome'];
$idade = $_POST['idade'];

if (isset($_POST['salvar'])) {

    //POSTGRESQL
    $nome = addslashes($_POST['nome']);
    $idade = addslashes($_POST['idade']);

    if (is_numeric($idade)) {

        $query = "INSERT INTO registros (nome, idade) VALUES ('$nome', $idade)";

        $conn = Connection::connectionDB();

        if (pg_query($query)) {
            $_SESSION['mensagem'] = '<div class="alert alert-primary" role="alert">Registro inserido com sucesso!</div>';
            header('location: ../list.php');
        } else {
            $_SESSION['mensagem'] = '<div class="alert alert-danger" role="alert">Erro ao inserir!</div>';
            header('location: ../list.php');
        }

        pg_close();
    } else {
        header('location: ../index.php');
    }

    //MYSQL
    // $conn = Connection::connectionDB();

    // $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    // $idade = mysqli_real_escape_string($conn, trim($_POST['idade']));

    // $nome = htmlspecialchars($nome);
    // $idade = htmlspecialchars($idade);

    // $sql = "INSERT INTO registros (nome, idade) VALUES (?, ?)";

    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param('si', $nome, $idade);

    // if ($stmt->execute()) {
    //     $_SESSION['mensagem'] = '<div class="alert alert-primary" role="alert">Registro inserido com sucesso!</div>';
    //     header('location: ../list.php');
    // } else {
    //     $_SESSION['mensagem'] = '<div class="alert alert-danger" role="alert">Erro ao inserir!</div>';
    //     header('location: ../list.php');
    // }

    // $conn->close();
}
