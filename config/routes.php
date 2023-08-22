<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder $routes) {
    $routes->setRouteClass(DashedRoute::class);
    
    $routes->scope('/admin98', function (RouteBuilder $builder) {
        $builder->connect('/', ['controller' => 'Pages', 'action' =>'checkLogin', 'login']);
        // $builder->connect('/', ['controller' => 'Category', 'action' => 'index']);
        $builder->fallbacks();
    });
    
    $routes->scope('/', function (RouteBuilder $builder) {
        $builder->connect('/',['controller' => 'Pages', 'action' => 'showHomePage','home']);
        $builder->fallbacks();
    });
    

};
