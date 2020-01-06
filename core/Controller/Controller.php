<?php

namespace Core\Controller;

use Core\lib\Router;
use Core\Service\ContainerInjector;
use Core\Service\Service;

/**
 * Class Controller
 * @package App\core
 */
abstract class Controller
{

    /**
     * @var Service
     */
    private $container;

    /**
     * @param $file
     * @param array $data
     * @return mixed
     */
    protected function renderPage($file, array $data = [])
    {
        extract($data);
        unset($data);
        return require_once(__DIR__ . "/../../src/View/pages/{$file}.php");
    }

    /**
     * @param $file
     * @param array $data
     * @return mixed
     */
    protected function renderBlock($file, array $data = [])
    {
        extract($data);
        unset($data);
        return require(__DIR__ . "/../../src/View/blocks/{$file}.php");
    }

    /**
     * @param array $scripts
     * @return void
     */
    protected function renderScripts(array $scripts = [])
    {
        foreach ($scripts as $script)
        {
            $this->renderBlock('script', [
                'script' => $script
            ]);
        }
    }

    /**
     * @return Service
     */
    protected function getContainer()
    {
        if (!$this->container instanceof Service) {
            $this->container = ContainerInjector::getContainer();
        }

        return $this->container;
    }

    /**
     * @return array
     */
    protected function getCurrentPath()
    {
        $router = ContainerInjector::getContainer()->get(Router::class);
        $path = trim($router->getRequestUri(), '/');

        return explode('/', $path);
    }
}
