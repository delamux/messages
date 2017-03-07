<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'CakeMojo/Messages',
    ['path' => '/cake-mojo/messages'],
    function (RouteBuilder $routes) {
        $routes->prefix('admin', function ($routes) {
            $routes->connect('/:controller');
        });
        $routes->fallbacks(DashedRoute::class);
    }
);

