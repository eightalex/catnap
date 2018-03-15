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
     * @return mixed
     */
    public function render($file, $data = []) {
        extract($data);
        unset($data);
        return require_once(__DIR__ . "../../View/{$file}.php");
    }
}