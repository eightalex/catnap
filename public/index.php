<?php

namespace Core;

use Core\DataBase\DataBase;
use Core\lib\Router;
use Core\Service\ContainerInjector;
use Core\Service\Service;

require '../core/lib/Router.php';
require '../core/lib/rb-sqlite.php';
require '../core/DataBase/DataBase.php';
require '../core/Model/Entity.php';
require '../core/Model/Repository.php';
require '../core/Controller/Controller.php';
require '../core/Service/Service.php';
require '../core/Service/ContainerInjector.php';
require '../src/Controller/PageController.php';
require '../src/Controller/OrderController.php';
require '../src/Model/Page/Page.php';
require '../src/Model/Page/PageRepository.php';
require '../src/Model/Item/Item.php';
require '../src/Model/Item/ItemRepository.php';
require '../src/Model/Order/Order.php';
require '../src/Model/Order/OrderRepository.php';

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
        \R::setup('sqlite:' . DataBase::getAbsolutePathToDatabase());

        $this->initService([
            Router::class => [
                $this->getServiceUri(), $_SERVER['REQUEST_METHOD']
            ]
        ]);
        $this->initRouter([
            '/'                 => 'App\PageController@mainPage',
            '/contact-us'       => 'App\PageController@contactUs',
            '/cart'             => 'App\PageController@cart',
            '/item/:num'        => 'App\PageController@item',
            '/order/add/:any'   => 'App\OrderController@setOrder'
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