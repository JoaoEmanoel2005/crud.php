<?php 

class Database {
    public static function connect() {
        return new PDO(
            'mysql:
            host=localhost;
            dbname=restful;
            charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
}