<?php

require '../core/Router.php';
require '../core/Controller.php';
require '../src/Controller/TestController.php';

$router = App\core\Router::fromGlobals();

$router->add([
    '/' => 'App\TestController@mainPage',
    '/contact-us' => 'App\TestController@contactUs'
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