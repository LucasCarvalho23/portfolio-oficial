<?php

    namespace App;

use PDOException;

    class Connection {

        public static function getDb() {
            try {
                $host = 'localhost';
                $dbname = 'db_portfolio';
                $user = "root";
                $password = "Skrillex@23";
                $connect = new \PDO(
                    "mysql:host=$host;dbname=$dbname;charset=utf8",
                    "$user",
                    "$password"
                );

                return $connect;

            } catch (\PDOException $e) {
                echo $e;
            }
        }

    }

?>