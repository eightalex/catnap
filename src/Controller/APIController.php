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
    private $cache;

    /**
     * @var object
     */
    private $novaPoshta;

    /**
     * APIController constructor.
     */
    public function __construct()
    {
        $this->cache = new \Memcache();
        $this->novaPoshta = $this->getContainer()->get(NovaPoshtaApi2::class);

        $this->cache->addServer('localhost', 11211);
    }

    /**
     *
     */
    function getNPCities()
    {
        if (!$cities = $this->cache->get('np_cities')) {
            $cities = $this->novaPoshta->getCities();
            $this->cache->set('np_cities', $cities, 0, self::DAY);
        }

        echo json_encode($cities['data']);
    }

    /**
     *
     */
    function getNPWarehouses()
    {
        $cacheKey = 'np_warehouses_' . $_POST['CityID'];

        if (!$warehouses = $this->cache->get($cacheKey)) {
            $warehouses = $this->novaPoshta->getWarehouses($_POST['cityRef']);
            $this->cache->set($cacheKey, $warehouses, 0, self::DAY);
        }

        echo json_encode($warehouses['data']);
    }
}