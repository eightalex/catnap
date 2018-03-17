<?php

require '../core/Router.php';
require '../core/Model.php';
require '../core/Controller.php';
require '../core/Pool.php';
require '../core/Exception/ModelException.php';
require '../src/Controller/PageController.php';
require '../src/Controller/FilterController.php';
require '../src/Model/Test.php';
require '../src/Model/Page.php';

$router = Core\Router::fromGlobals();
\Core\Pool::set('router', $router);

$router->add([
    '/'                 => 'App\PageController@mainPage',
    '/contact-us'       => 'App\PageController@contactUs',
    '/cart'             => 'App\PageController@cart',
    '/filter/:any'      => 'App\FilterController@filterAction',
    '/test-router/:num' => 'App\PageController@testRequest',
    '/test-entity'      => 'App\PageController@testEntity',
    '/item/:num'        => 'App\PageController@item'
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

exit;