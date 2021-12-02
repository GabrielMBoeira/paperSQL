<?php
session_start();

require_once('conexao.php');

if (isset($_POST['salvar'])) {

    //POSTGRESQL
    $id = addslashes($_POST['id']);
    $nome = addslashes($_POST['nome']);
    $nome = strtoupper($nome);
    $idade = addslashes($_POST['idade']);
    $id_cidade = addslashes($_POST['id_cidade']);

    if (is_numeric($idade)) {

        $query = "UPDATE registros SET nome = '$nome', idade = $idade, id_cidade = $id_cidade WHERE id = $id";

        $conn = Connection::connectionDB();

        if (pg_query($query)) {
            $_SESSION['mensagem'] = '<div class="alert alert-primary" role="alert">Registro salvo com sucesso!</div>';
            header('location: ../list.php');
        } else {
            $_SESSION['mensagem'] = '<div class="alert alert-danger" role="alert">Erro ao inserir!</div>';
            header('location: ../list.php');
        }

        pg_close();
    }


    //MYSQL
    // $conn = conexao();

    // $id = mysqli_real_escape_string($conn, trim($_POST['id']));
    // $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    // $idade = mysqli_real_escape_string($conn, trim($_POST['idade']));

    // $id = htmlspecialchars($id);
    // $nome = htmlspecialchars($nome);
    // $idade = htmlspecialchars($idade);

    // $sql = "UPDATE registros SET nome = ?, idade = ? WHERE id = ?";

    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param('sii', $nome, $idade, $id);

    // if ($stmt->execute()) {
    //     $_SESSION['mensagem'] = '<div class="alert alert-primary" role="alert">Registro salvo com sucesso!</div>';
    //     header('location: ../list.php');
    // } else {
    //     $_SESSION['mensagem'] = '<div class="alert alert-danger" role="alert">Erro ao inserir!</div>';
    //     header('location: ../list.php');
    // }

    // $conn->close();
}
