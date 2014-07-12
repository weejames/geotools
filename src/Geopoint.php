<?php

namespace WeeJames\Geotools;

class Geopoint
{
    // available units
    const GEO_UNIT_KM = 'km';
    const GEO_UNIT_MILES = 'miles';


    // available algorithms
    const ALGORITHM_FLAT = 'flat';
    const ALGORITHM_HAVERSINE = 'haversine';

    // coordinates of this point
    private $latitude;
    private $longitude;

    // stores the current operation taking place
    public $currentOperation;

    // current units
    public $currentUnit;

    // target point
    public $targetGeopoint;

    // current algorithm
    public $currentAlgorithm;

    public function __construct($latitude, $longitude)
    {
        $this->currentUnit = self::GEO_UNIT_KM;
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
        $this->currentUnit = $unit;
        return $this;
    }

    public function to(Geopoint $target)
    {
        $this->targetGeopoint = $target;
        return $this;
    }

    public function using($algorithm)
    {
        $this->currentAlgorithm = $algorithm;
        return $this;
    }

    public function getTarget()
    {
        return $this->targetGeopoint;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function getUnit()
    {
        return $this->currentUnit;
    }

    public function getAlgorithm()
    {
        return $this->currentAlgorithm;
    }
}
