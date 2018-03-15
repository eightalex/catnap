<?php

namespace App;

use Core\Controller;

/**
 * Class FilterController
 * @package App
 */
class FilterController extends Controller
{

    /**
     *
     */
    public function filterAction()
    {
        // Example request: site.com/filter/key1/value1/key2/value2/key3/value3
        $request = array_merge($_REQUEST, $_SERVER);

        $this->renderPage('filter', [
            'request' => $request
        ]);
    }
}