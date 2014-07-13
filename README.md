Geotools
========

[![Build Status](https://travis-ci.org/weejames/geotools.svg?branch=master)](https://travis-ci.org/weejames/geotools)

A library that provides some simple tools for working with location data.

```php
$startPoint = new \WeeJames\Geotools\Geopoint(
    $this->startLatitude,
    $this->startLongitude
);

$targetPoint = new \WeeJames\Geotools\Geopoint(
    $this->targetLatitude,
    $this->targetLongitude
);

$distanceToTarget = $startPoint
                        ->distance()
                        ->to($targetPoint)
                        ->using(\WeeJames\Geotools\Tools::ALGORITHM_HAVERSINE)
                        ->is();
```
