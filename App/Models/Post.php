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
            echo $this->id_usuario;
            echo ("<br>");
            echo $this->title;
            echo ("<br>");
            echo $this->description;
            echo ("<br>");
            echo $this->pinpost;
            echo ("<br>");
            echo $this->data;
            echo ("<br>");
        }
    }

?>