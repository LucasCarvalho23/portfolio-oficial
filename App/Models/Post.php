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
        private $data_modif;

        public function __get($attr) {
            return $this->$attr;
        }

        public function __set($attr, $value) {
            $this->$attr = $value;
        }

        public function alterPinpost() {
            $query = "UPDATE tb_posts SET pinpost = 'off' WHERE id != :id AND title = :title";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $_POST['id']);
            $stmt->bindValue(':title', $_POST['title']);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
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

        public function fixed($id_post, $title) {
            $query = "UPDATE tb_posts SET pinpost = 'off' WHERE id != :id_post AND title = :title";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_post', $id_post);
            $stmt->bindValue(':title', $title);
            $stmt->execute();
            $queryOn = "UPDATE tb_posts SET pinpost = 'on' WHERE id = :id_post AND title = :title";
            $stmt = $this->db->prepare($queryOn);
            $stmt->bindValue(':id_post', $id_post);
            $stmt->bindValue(':title', $title);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function readCountPost($id_usuario) {
            $query = "SELECT COUNT(*) FROM tb_posts WHERE id_usuario = :id_usuario";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_usuario', $id_usuario);
            $stmt->execute();
            return $stmt->fetchColumn();
        }

        public function readPost($title) {
            $query = "SELECT id, title, description, data, pinpost FROM tb_posts WHERE title = :title ORDER BY pinpost DESC, data DESC";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':title', $title);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function removePost() {
            $query = "DELETE FROM tb_posts WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $_POST['id']);
            $stmt->execute();
            return true;
        }

        public function updatePost($pinpost) {
            $query = "UPDATE tb_posts SET title = :title, description = :description, pinpost = :pinpost WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $_POST['id']);
            $stmt->bindValue(':title', $_POST['title']);
            $stmt->bindValue(':description', $_POST['description']);
            $stmt->bindValue(':pinpost', $pinpost);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        
    }

?>