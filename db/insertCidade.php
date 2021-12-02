<?php
session_start();

require_once('conexao.php');

$nomeCidade = $_POST['nomeCidade'];

if (isset($_POST['salvar'])) {

    //POSTGRESQL
    $nomeCidade = addslashes($_POST['nomeCidade']);

    $nomeCidade = strtoupper($nomeCidade);

    $query = "INSERT INTO cidades (nome) VALUES ('$nomeCidade')";

    $conn = Connection::connectionDB();

    if (pg_query($query)) {
        $_SESSION['mensagem'] = '<div class="alert alert-primary" role="alert">Cidade inserida com sucesso!</div>';
        header('location: ../listCidades.php');
    } else {
        $_SESSION['mensagem'] = '<div class="alert alert-danger" role="alert">Erro ao inserir Cidade!</div>';
        header('location: ../listCidades.php');
    }

    pg_close();
}
