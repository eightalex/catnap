<?php

require '../src/core/Router.php';
require '../src/core/Controller.php';
require '../src/Controller/TestController.php';

$router = App\core\Router::fromGlobals();

$router->add('/', function () {
    echo 'Hello from Litero!';
});

$router->add([
    '/test'       => 'App\TestController@testAction'
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