<?php
session_start();

require_once('conexao.php');

if (isset($_GET['id'])) {


    //POSTGRESQL
    $id = addslashes($_GET['id']);


        $query = "DELETE FROM cidades WHERE id = $id";

        $conn = Connection::connectionDB();

        if (pg_query($query)) {
            $_SESSION['mensagem'] = '<div class="alert alert-primary" role="alert">Cidade deletada com sucesso!</div>';
            header('location: ../listCidades.php');
        } else {
            $_SESSION['mensagem'] = '<div class="alert alert-danger" role="alert">Cidade não pode ser deletada pois está vinculada a um aluno!</div>';
            header('location: ../listCidades.php');
        }

        pg_close();

}
