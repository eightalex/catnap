<?php

require '../core/Router.php';
require '../core/Model.php';
require '../core/Controller.php';
require '../core/Pool.php';
require '../core/Exception/ModelException.php';
require '../src/Controller/TestController.php';
require '../src/Controller/FilterController.php';
require '../src/Model/Test.php';

$router = Core\Router::fromGlobals();
\Core\Pool::set('router', $router);

$router->add([
    '/'                 => 'App\TestController@mainPage',
    '/contact-us'       => 'App\TestController@contactUs',
    '/filter/:any'      => 'App\FilterController@filterAction',
    '/test-router/:num' => 'App\TestController@testRequest',
    '/test-entity'      => 'App\TestController@testEntity',
    '/item/:num'        => 'App\TestController@item'
]);

if ($router->isFound()) {
    $router->executeHandler(
        $router->getRequestHandler(),
        $router->getParams()
    );
} else {
    $router->executeHandler(function () {
        http_response_code(404);
        echo '404 Not found';
    });
}