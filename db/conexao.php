<?php
class Connection
{
    public static function connectionDB()
    {
        $host = 'ec2-35-168-80-116.compute-1.amazonaws.com';
        $dbname = 'da889bcon6gnub';
        $user = 'lntmtgamotyunl';
        $password = '1e70574a7481af5a2af733f4c5bf33372b060881e494b3523abbbe88ac09a62f';
        $port = '5432';

        $conn_string  = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

        if (!$conn_string) {
            echo "Error " . pg_last_error();
        }

        return $conn_string;
    }
}
