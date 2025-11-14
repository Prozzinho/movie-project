<?php 

namespace App\Database;

class Mysql
{

    public function connectBDD() {

        return new \PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME .'',
            DB_USERNAME,
            DB_PASSWORD, 
            [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
        );
    }
}
