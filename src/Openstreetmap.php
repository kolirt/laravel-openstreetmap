<?php

namespace Kolirt\Openstreetmap;

use GuzzleHttp\Client;

class Openstreetmap
{

    private $client;
    private $api = 'https://nominatim.openstreetmap.org/';

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->api,
            'timeout' => config('openstreetmap.timeout', 1)
        ]);
    }

    public function details(int $place_id)
    {
        try {
            $request = $this->client->get('details', [
                'query' => [
                    'place_id' => $place_id,
                    'format' => 'json',
                    'accept-language' => config('openstreetmap.lang')
                ]
            ]);

            if ($request->getStatusCode() == 200) {
                return json_decode($request->getBody()->getContents());
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function reverse(float $lat, float $lng)
    {
        try {
            $request = $this->client->get('reverse', [
                'query' => [
                    'lat' => $lat,
                    'lon' => $lng,
                    'format' => 'json',
                    'accept-language' => config('openstreetmap.lang')
                ]
            ]);

            if ($request->getStatusCode() == 200) {
                $result = json_decode($request->getBody()->getContents());

                if (is_null($result->error ?? null)) {
                    return $result;
                }

                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function search(string $q, int $limit = 10)
    {
        try {
            $request = $this->client->get('search', [
                'query' => [
                    'q' => $q,
                    'polygon_geojson' => 1,
                    'limit' => $limit,
                    'format' => 'json',
                    'accept-language' => config('openstreetmap.lang')
                ]
            ]);

            if ($request->getStatusCode() == 200) {
                return json_decode($request->getBody()->getContents());
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function searchByParams($streetname = null, $housenumber = null, $city = null, $state = null, $country = null, $postalcode = null, int $limit = 10)
    {
        try {
            $request = $this->client->get('search', [
                'query' => [
                    'street' => $housenumber . ' ' . $streetname,
                    'city' => $city,
                    'state' => $state,
                    'country' => $country,
                    'postalcode' => $postalcode,
                    'polygon_geojson' => 1,
                    'limit' => $limit,
                    'format' => 'json',
                    'accept-language' => config('openstreetmap.lang')
                ]
            ]);

            if ($request->getStatusCode() == 200) {
                return json_decode($request->getBody()->getContents());
            }
        } catch (\Exception $e) {
            return null;
        }
    }

}