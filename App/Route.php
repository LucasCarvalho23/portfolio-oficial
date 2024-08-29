<?php

    namespace App;
    use MF\Init\Bootstrap;

    class Route extends Bootstrap {

        protected function initRoutes() {
            $routes['home'] = array(
                'route' => '/',
                'controller' => 'IndexController',
                'action' => 'index'
            );
            $routes['portfolio'] = array(
                'route' => '/portfolio',
                'controller' => 'IndexController',
                'action' => 'portfolio'
            );

            $this->setRoutes($routes);
            
        }

    }

?>