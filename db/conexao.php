<?php
class Connection
{
    public static function connectionDB($banco = 'heroku_212b174f4f5c3ac')
    {
        $servidor = 'us-cdbr-east-06.cleardb.net';
        $usuario = 'b5b973d025ca87';
        $senha = '68c61b57';

        $conn = new mysqli($servidor, $usuario, $senha, $banco);

        if ($conn->connect_error) {
            die('Erro: ' . $conn->connect_error);
        }

        return $conn;
    }
}
