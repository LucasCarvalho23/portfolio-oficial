<?php

    namespace App\Models;
    use MF\Model\Model;

    class Jobs extends Model {
        private $id;
        private $name;
        private $description;
        private $technologies;
        private $github;
        private $title;
        private $site;

        public function __get($attr) {
            return $this->$attr;
        }

        public function __set($attr, $value) {
            $this->$attr = $value;
        }

        public function readJobs() {
            $query = "SELECT name, description, technologies, github, title, site FROM tb_jobs";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
?>