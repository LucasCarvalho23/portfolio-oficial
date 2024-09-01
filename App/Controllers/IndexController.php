<?php

    namespace App\Controllers;
    use MF\Controller\Action;
    use MF\Model\Container;

    class IndexController extends Action {

        public function aboutme() {
            $this->loadUserData();
            $this->render('aboutme');
        }

        public function index() {
            $this->loadUserData();
            $this->render('index');
        }

        private function loadUserData() {
            session_start();
            if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
                $this->view->nameuser = isset($_SESSION['nameuser']) ? $_SESSION['nameuser'] : 'Guest';
            }
        }

        public function login() {
            $this->render('login');
        }

        public function logout() {
            session_start();
            session_destroy();
            header('Location: /login');
        }

        public function portfolio() {
            $this->loadUserData();


            $jobs = Container::getModel('jobs');
            $job = $jobs->readJobs();

            echo ("<pre>");
            print_r($job);
            echo ("</pre>");
            die;

            $this->render('portfolio');
        }

        public function timeline() {
            $this->loadUserData();
            if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
                $this->render('timelineadm');
            } else {
                $this->render('timeline');
            }
        }

        public function timelineadm() {
            session_start();
            if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
                $this->render('timelineadm');
            } else {
                $login = Container::getModel('login');
                $login->__set('login', $_POST['login']);
                $login->__set('password', md5($_POST['password']));
                $return = $login->validateLogin();
                $this->view->nameuser = $login->readLogin();
                if ($return) {
                    $_SESSION['login'] = true;
                    $_SESSION['nameuser'] = $login->readLogin();
                    $this->render('timelineadm');
                } else {
                    $_SESSION['login'] = false;
                    header('Location: /login?error=authentication');
                }
            }
        }

    }

?>