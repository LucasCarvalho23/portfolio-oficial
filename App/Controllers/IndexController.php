<?php

    namespace App\Controllers;
    use MF\Controller\Action;
    use MF\Model\Container;

    class IndexController extends Action {

        public function aboutme() {
            echo "Cheguei no about me";
        }

        public function index() {
            $this->render('index');
        }

        public function login() {
            $this->render('login');
        }

        public function portfolio() {
            echo "Cheguei no Portfolio";
        }

        public function timeline() {
            echo "Cheguei no pseudo-twitter";
        }

    }

?>