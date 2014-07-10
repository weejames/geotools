<?php

namespace WeeJames\Geotools;

class Geopoint
{

    // coordinates of this point
    private $latitude;
    private $longitude;

    // available units
    public static $GEO_UNIT_KM = 'km';
    public static $GEO_UNIT_MILES = 'miles';


    // available algorithms
    public static $ALGORITHM_FLAT = 'flat';
    public static $ALGORITHM_HAVERSINE = 'haversine';

    // stores the current operation taking place
    public $currentOperation;

    // current units
    public $currentUnit = 'km';

    // target point

    public function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }


    /**
     * Sets the current operation to distance
     */
    public function distance()
    {

    }

    public function in($unit)
    {

    }

    public function to(Coordinate $target)
    {

    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }
}
