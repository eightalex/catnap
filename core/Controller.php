<?php

namespace Core;


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
        return require_once(__DIR__ . "/../src/View/pages/{$file}.php");
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
        return require(__DIR__ . "/../src/View/blocks/{$file}.php");
    }

    /**
     * @param array $styles
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

    /**
     * @return Service
     */
    protected function getContainer()
    {
        if (!$this->container instanceof Service) {
            $this->container = ServiceInjection::getService();
        }

        return $this->container;
    }
}
