<?php

    namespace App\Models;
    use MF\Model\Model;

    class Post extends Model {

        private $id;
        private $id_usuario;
        private $title;
        private $description;
        private $pinpost;
        private $data;

        public function __get($attr) {
            return $this->$attr;
        }

        public function __set($attr, $value) {
            $this->$attr = $value;
        }

        public function createPost() {
            $query = "INSERT INTO tb_posts(id_usuario, title, description, data, pinpost) VALUES (:id_usuario, :title, :description, :data, :pinpost)";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
            $stmt->bindValue(':title', $this->__get('title'));
            $stmt->bindValue(':description', $this->__get('description'));
            $stmt->bindValue(':data', $this->__get('data'));
            $stmt->bindValue(':pinpost', $this->__get('pinpost'));
            $stmt->execute();
            return $this;
        }

        public function readCountPost($id_usuario) {
            $query = "SELECT COUNT(*) FROM tb_posts WHERE id_usuario = :id_usuario";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_usuario', $id_usuario);
            $stmt->execute();
            return $stmt->fetchColumn();
        }

        public function readPost($id_usuario) {
            $query = "SELECT title, description FROM tb_posts  WHERE id_usuario = :id_usuario";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_usuario', $id_usuario);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        
    }

?>