<?php

namespace App\core;


/**
 * Class Controller
 * @package App\core
 */
abstract class Controller
{

    /**
     * @param $file
     * @param array $data
     */
    protected function render($file, $data = []) {
        extract($data);
        unset($data);
        echo require_once(__DIR__ . "../../View/{$file}.php");
    }
}
