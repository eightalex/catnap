<?php

namespace App;

use Core\Controller\Controller;

/**
 * Class APIController
 * @package App
 */
class APIController extends Controller
{

    /**
     *
     */
    const DAY = 86400;

    /**
     * @var \Memcache
     */
    private $M;

    /**
     * @var object
     */
    private $NP;

    /**
     * APIController constructor.
     */
    public function __construct()
    {
        $this->M = new \Memcache();
        $this->NP = $this->getContainer()->get(NovaPoshtaApi2::class);

        $this->M->addServer('localhost', 11211);
    }

    /**
     *
     */
    function getNPCities()
    {
        if (!$cities = $this->M->get('np_cities')) {
            $cities = $this->NP->getCities();
            $this->M->set('np_cities', $cities, 0, self::DAY);
        }

        echo json_encode($cities['data']);
    }

    /**
     *
     */
    function getNPWarehouses()
    {
        $cacheKey = 'np_warehouses_' . $_POST['CityID'];

        if (!$departaments = $this->M->get($cacheKey)) {
            $departaments = $this->NP->getWarehouses($_POST['cityRef']);
            $this->M->set($cacheKey, $departaments, 0, self::DAY);
        }

        echo json_encode($departaments['data']);
    }
}