Geotools
========

[![Build Status](https://travis-ci.org/weejames/geotools.svg?branch=master)](https://travis-ci.org/weejames/geotools)

A library that provides some simple tools for working with location data.

## Distance Calculations

```php
$startPoint = new \WeeJames\Geotools\Geopoint(
    55.8580,
    4.2590
);

$targetPoint = new \WeeJames\Geotools\Geopoint(
    40.7127,
    74.0059
);

$distanceToTarget = $startPoint
                        ->distance()
                        ->to($targetPoint)
                        ->using(\WeeJames\Geotools\Tools::ALGORITHM_HAVERSINE)
                        ->is();
```
