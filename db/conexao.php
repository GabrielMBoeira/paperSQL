<?php
class Connection
{

    public static function connectionDB()
    {
        $conn_string  = pg_connect("host=localhost dbname=papersql user=postgres password=123456");

        if (!$conn_string) {
            echo "Error " . pg_last_error();
        }

        return $conn_string;
    }
}
