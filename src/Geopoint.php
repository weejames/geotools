<?php

namespace WeeJames\Geotools;

class Geopoint
{
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
        $this->currentUnit = \WeeJames\Geotools\Tools::GEO_UNIT_KM;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     *
     */
    public function is()
    {
        switch ($this->currentOperation) {
            case \WeeJames\Geotools\Tools::DISTANCE_OPERATION:
                return \WeeJames\Geotools\Tools::distanceBetween(
                    $this,
                    $this->targetGeopoint,
                    $this->currentAlgorithm,
                    $this->currentUnit
                );
                break;
        }
    }


    /**
     * Sets the current operation to distance
     */
    public function distance()
    {
        $this->currentOperation = \WeeJames\Geotools\Tools::DISTANCE_OPERATION;
        return $this;
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

    public function getOperation()
    {
        return $this->currentOperation;
    }
}
