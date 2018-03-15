<?php

require '../core/Router.php';
require '../core/Controller.php';
require '../core/Pull.php';
require '../src/Controller/TestController.php';
require '../src/Controller/FilterController.php';

$router = Core\Router::fromGlobals();
\Core\Pull::set('router', $router);

$router->add([
    '/'                 => 'App\TestController@mainPage',
    '/contact-us'       => 'App\TestController@contactUs',
    '/filter/:any'      => 'App\FilterController@filterAction',
    '/test_router/:num'  => 'App\TestController@testRequest'
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