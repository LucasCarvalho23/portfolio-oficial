<?php

    namespace App\Controllers;
    use MF\Controller\Action;
    use MF\Model\Container;

    class IndexController extends Action {

        public function index() {
            $this->render('index');
        }

        public function portfolio() {
            echo "Cheguei no Portfolio";
        }

        public function timeline() {
            echo "Cheguei no pseudo-twitter";
        }

        public function aboutme() {
            echo "Cheguei no about me";
        }

    }

?>