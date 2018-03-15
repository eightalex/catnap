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
     * @return mixed
     */
    protected function render($file, $data = []) {
        extract($data);
        unset($data);
        return require_once(__DIR__ . "/../src/View/{$file}.php");
    }

    /**
     * @param $block_name
     * @param array ...$props
     * @return bool|string
     */
    protected function include_block($block_name, ...$props) {
        $block = file_get_contents(__DIR__ . "/../src/View/blocks/$block_name.html");

        if ($props) {
            foreach ($props as $prop) {
                $block = sprintf($block, $prop);
            }
        }

        return $block;
    }
}
