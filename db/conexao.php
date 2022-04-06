<?php
class Connection
{
    public static function connectionDB($banco = 'heroku_afaee45df8121f9')
    {
        $servidor = 'us-cdbr-east-05.cleardb.net';
        $usuario = 'bf39d95a717b31';
        $senha = '4d38de20';

        $conn = new mysqli($servidor, $usuario, $senha, $banco);

        if ($conn->connect_error) {
            die('Erro: ' . $conn->connect_error);
        }

        return $conn;
    }
}
