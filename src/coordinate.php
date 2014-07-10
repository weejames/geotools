<?php

namespace \WeeJames\Geotools;

class Coordinate
{

    private $latitude;
    private $longitude;

    public static GEO_UNIT_KM = 'km';
    public static GEO_UNIT_MILES = 'miles';

    public function __construct($latitude, $Longitude) {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }


    /**
     * Sets this
     */
    public function distance() {

    }

    public function in($unit) {

    }

    public function to(Coordinate $target) {

    }



}
