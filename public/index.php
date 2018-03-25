<?php

namespace Core;

require '../core/Router.php';
require '../core/Model.php';
require '../core/Controller.php';
require '../core/Service.php';
require '../core/ContainerInjector.php';
require '../core/Exception/ModelException.php';
require '../src/Controller/PageController.php';
require '../src/Controller/FilterController.php';
require '../src/Model/PageRepository.php';
require '../src/Model/ItemRepository.php';

/**
 * Class App
 * @package Core
 */
class App
{

    /**
     *
     */
    public function init()
    {
        $this->initService([
            Router::class => [
                $this->getServiceUri(), $_SERVER['REQUEST_METHOD']
            ]
        ]);
        $this->initRouter([
            '/'                 => 'App\PageController@mainPage',
            '/contact-us'       => 'App\PageController@contactUs',
            '/cart'             => 'App\PageController@cart',
            '/filter/:any'      => 'App\FilterController@filterAction',
            '/item/:num'        => 'App\PageController@item'
        ]);
    }

    /**
     * @param array $routing
     */
    private function initRouter(array $routing)
    {
        $router = ContainerInjector::getContainer()->get(Router::class);
        $router->add($routing);

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
    }

    /**
     * @param $services
     */
    private function initService(array $services)
    {
        $serviceLocator = new Service();
        ContainerInjector::setContainer($serviceLocator);

        foreach ($services as $service => $params) {
            $serviceLocator->add($service, $params);
        }
    }

    /**
     * @return bool|string
     */
    private function getServiceUri()
    {
        $uri = $_SERVER['REQUEST_URI'];
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        return $uri;
    }
}


$app = new App();
$app->init();