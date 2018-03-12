<?php

namespace Bit55\Litero;

class RouterActions
{
    public static function render($file, $data = []) {
        extract($data);
        unset($data);
        echo require_once(__DIR__ . "../View/{$file}.php");
    }
}