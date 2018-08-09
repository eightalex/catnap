<?php

namespace Core\Controller;

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
     * @param array $styles
     * @return null
     */
    protected function renderStyles(array $styles = [])
    {
        foreach ($styles as $style)
        {
            $this->renderBlock('head__link_stylesheet', [
                'style' => $style
            ]);
        }
    }

    protected function renderScripts(array $scripts = [])
    {
        foreach ($scripts as $script)
        {
            $this->renderBlock('bottom__script', [
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

    protected function getCurrentPath()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        $path = explode('/', $url['path']);

        return array_slice($path, 1);
    }
}
