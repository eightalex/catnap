<?php

namespace App\core;


/**
 * Class Controller
 * @package App\core
 */
class Controller
{

    /**
     * @param $file
     * @param array $data
     */
    public function render($file, $data = []) {
        extract($data);
        unset($data);
        echo require_once(__DIR__ . "../../View/{$file}.php");
    }
}