# Laravel Openstreetmap 

## Installation
```
$ composer require kolirt/laravel-openstreetmap
```
```
$ php artisan openstreetmap:install
```

## Methods

#### Details by place_id
```
Kolirt\Openstreetmap\Facade\Openstreetmap::details(int $place_id);
```

#### Reverse
```
Kolirt\Openstreetmap\Facade\Openstreetmap::reverse(float $lat, float $lng);
```

#### Search
```
Kolirt\Openstreetmap\Facade\Openstreetmap::search(string $q, int $limit = 10);
```

#### Search by params
```
Kolirt\Openstreetmap\Facade\Openstreetmap::searchByParams($streetname = null, 
                                                          $housenumber = null, 
                                                          $city = null, 
                                                          $state = null, 
                                                          $country = null, 
                                                          $postalcode = null, 
                                                          int $limit = 10);
```
