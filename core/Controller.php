<?php

namespace Core;


/**
 * Class Controller
 * @package App\core
 */
abstract class Controller
{

    /**
     * @param $file
     * @param array $data
     * @return mixed
     */
    protected function renderPage($file, $data = []) {
        extract($data);
        unset($data);
        return require_once(__DIR__ . "/../src/View/pages/{$file}.php");
    }

    /**
     * @param $file
     * @param array $data
     * @return mixed
     */
    protected function renderBlock($file, $data = []) {
        extract($data);
        unset($data);
        return require(__DIR__ . "/../src/View/blocks/{$file}.php");
    }
}
