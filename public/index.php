<?php

require '../vendor/autoload.php';

/* @var $router Bit55\Litero\Router */
$router = Bit55\Litero\Router::fromGlobals();

$router->add('/', function () {
    echo 'Hello from Litero!';
});

$router->add([
    '/first'       => 'Bit55\Litero\ExampleController@firstAction',
    '/second/:any' => 'Bit55\Litero\ExampleController@secondAction',
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