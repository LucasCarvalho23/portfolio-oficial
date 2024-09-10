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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->getJobDetails();
        } else {
            $this->loadUserData();
            $this->render('portfolio');
        }
    }
    
    public function getJobDetails() {
        $titleImg = $_POST['title']; 
        $jobs = Container::getModel('jobs');
        $job = $jobs->readJobs($titleImg);
    
        if ($job) {
            $response = [
                'name' => $job[0]['name'] ?? '',
                'description' => $job[0]['description'] ?? '',
                'technologies' => $job[0]['technologies'] ?? '',
                'github' => $job[0]['github'] ?? '',
                'site' => $job[0]['site'] ?? '',
                'title' => $titleImg
            ];
            echo json_encode($response); 
        } else {
            echo json_encode(['error' => 'Job not found']);
        }
    }

    public function postadm() {
        session_start();
        if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
            $post = Container::getModel('post');
            $post->__set('id_usuario', $_SESSION['id']);
            $post->__set('title', $_POST['title']);
            $post->__set('description', $_POST['description']);
            if (isset($_POST['pinpost']) && $_POST['pinpost'] == 'on') {
                $post->__set('pinpost', $_POST['pinpost']);
            } else {
                $post->__set('pinpost', 'off');
            }
            $post->__set('data', date('Y-m-d H:i:s'));
            $postID = $_SESSION['id'];
            $this->view->postadm = $post->readCountPost($postID);
            $post->createPost();
        } else {
            session_destroy();
            header('Location: /login');
        }
        $this->render('timeline');
    }

    public function remove() {
        session_start();
        $post = Container::getModel('post');
        $post->removePost();
        $this->view->postadm = $post->readCountPost($_SESSION['id']);
        header('Location: /timeline');
    }

    public function timeline() {
        $this->loadUserData();
        $post = Container::getModel('post');
        if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
            $postID = $_SESSION['id'];
            $this->view->postadm = $post->readCountPost($postID);
            $this->render('timeline');
        } else {
            $postID = '1';
            $this->view->postadm = $post->readCountPost($postID);
            $this->render('timeline');
        }
    }

    public function timelineadm() {
        session_start();
        $post = Container::getModel('post');
        if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
            $postID = $_SESSION['id'];
            $this->view->postadm = $post->readCountPost($postID);
            $this->render('timeline');
        } else {
            $login = Container::getModel('login');
            $login->__set('login', $_POST['login']);
            $login->__set('password', md5($_POST['password']));
            $return = $login->validateLogin();
            $postID = $_SESSION['id'];
            $this->view->nameuser = $login->readLogin();
            $this->view->postadm = $post->readCountPost($postID);
            if ($return) {
                $_SESSION['login'] = true;
                $_SESSION['nameuser'] = $login->readLogin();
                $this->render('timeline');
            } else {
                $_SESSION['login'] = false;
                header('Location: /login?error=authentication');
            }
        }
    }

    public function update() {
        session_start();
        $post = Container::getModel('post');
        $post->__set('id', $_POST['id']);
        $post->__set('title', $_POST['title']);
        $post->__set('description', $_POST['description']);
        $post->__set('pinpost', $_POST['pinpost']);
        $post->updatePost();
        $this->view->postadm = $post->readCountPost($_SESSION['id']);
        //header('Location: /timeline');    
    }
}
?>
