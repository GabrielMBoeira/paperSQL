<?php
class Connection
{
    public static function connectionDB()
    {
        $host = 'localhost';
        $dbname = '';
        $user = '';
        $password = '';
        $port = '';

        $conn_string  = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

        if (!$conn_string) {
            echo "Error " . pg_last_error();
        }

        return $conn_string;
    }
}
