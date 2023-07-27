<?php

namespace Kolirt\Openstreetmap\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @method static object|null details(int $place_id)
 * @method static object|null reverse(float $lat, float $lng)
 * @method static array|null search(string $q, int $limit = 10)
 * @method static array|null searchByParams($streetname = null, $housenumber = null, $city = null, $state = null, $country = null, $postalcode = null, int $limit = 10)
 */
class Openstreetmap extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'openstreetmap';
    }

}