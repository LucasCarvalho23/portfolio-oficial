<?php

    namespace App;
    use MF\Init\Bootstrap;

    class Route extends Bootstrap {

        protected function initRoutes() {
            $routes['aboutme'] = array(
                'route' => '/aboutme',
                'controller' => 'IndexController',
                'action' => 'aboutme'
            );
            $routes['index'] = array(
                'route' => '/',
                'controller' => 'IndexController',
                'action' => 'index'
            );
            $routes['login'] = array(
                'route' => '/login',
                'controller' => 'IndexController',
                'action' => 'login'
            );
            $routes['logout'] = array(
                'route' => '/logout',
                'controller' => 'IndexController',
                'action' => 'logout'
            );
            $routes['portfolio'] = array(
                'route' => '/portfolio',
                'controller' => 'IndexController',
                'action' => 'portfolio'
            );
            $routes['timeline'] = array(
                'route' => '/timeline',
                'controller' => 'IndexController',
                'action' => 'timeline'
            );

            $routes['timelineadm'] = array(
                'route' => '/timelineadm',
                'controller' => 'IndexController',
                'action' => 'timelineadm'
            );

            $routes['postadm'] = array(
                'route' => '/postadm',
                'controller' => 'IndexController',
                'action' => 'postadm'
            );

            $this->setRoutes($routes);
            
        }

    }

?>