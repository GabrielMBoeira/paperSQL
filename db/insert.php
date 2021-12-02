<?php
session_start();

require_once('conexao.php');

$nome = $_POST['nome'];
$idade = $_POST['idade'];

if (isset($_POST['salvar'])) {

    //POSTGRESQL
    $nome = addslashes($_POST['nome']);
    $idade = addslashes($_POST['idade']);
    $id_cidade = addslashes($_POST['id_cidade']);

    $nome = strtoupper($nome);
    $idade = strtoupper($idade);
    $id_cidade = strtoupper($id_cidade);

    if (is_numeric($idade)) {

        $query = "INSERT INTO registros (nome, idade, id_cidade) VALUES ('$nome', $idade, $id_cidade)";

        $conn = Connection::connectionDB();

        if (pg_query($query)) {
            $_SESSION['mensagem'] = '<div class="alert alert-primary" role="alert">Registro inserido com sucesso!</div>';
            header('location: ../list.php');
        } else {
            $_SESSION['mensagem'] = '<div class="alert alert-danger" role="alert">Erro ao inserir o cadastro do aluno!</div>';
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
