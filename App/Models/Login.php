<?php

    namespace App\Models;
    use MF\Model\Model;

    class Login extends Model {
        private $login;
        private $password;

        public function __get($attr) {
            return $this->$attr;
        }

        public function __set($attr, $value) {
            $this->$attr = $value;
        }

        public function validateLogin() {
            $query = "SELECT id, login, password FROM tb_register WHERE login = :login AND password = :password";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":login", $_POST['login'], \PDO::PARAM_STR);
            $stmt->bindValue(":password", md5($_POST['password']), \PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);
            if (isset($user['login']) && isset($user['password'])) {
                $userLogged = true;
            } else {
                $userLogged = false;
            }
            return $userLogged;
        }

        public function insertLogin() {
            $query = "INSERT INTO tb_register(login, password) VALUES (:login, :password)";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':login', $this->__get('login'));
            $stmt->bindValue(':password', $this->__get('password'));
            $stmt->execute();
            return true;
        }

        public function readLogin() {
            $query = "SELECT name FROM tb_register WHERE login = :login AND password = :password";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':login', $this->__get('login'));
            $stmt->bindValue(':password', $this->__get('password'));
            $stmt->execute();
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $user['name'];
        }

    }

?>