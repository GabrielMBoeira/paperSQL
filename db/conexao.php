<?php

function conexao()
{
    $user = 'root';
    $password = '';
    $database = 'papersql';
    $host = 'localhost';

    $conn = new mysqli($host, $user, $password, $database);

    if ($conn->connect_error) {
        die('Erro' . $conn->connect_error);
    }

    return $conn;
}
