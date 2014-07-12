<?php

namespace WeeJames\Geotools\Tests;

class GeopointTest extends \PHPUnit_Framework_TestCase
{

    // Glasgow
    private $startLatitude = 55.8580;
    private $startLongitude = 4.2590;

    // NewYork
    private $targetLatitude = 40.7127;
    private $targetLongitude = 74.0059;

    public function setUp()
    {

    }

    /**
     * @test
     */
    public function geopointCanBeCreatedSuccessfully()
    {
        $startPoint = new \WeeJames\Geotools\Geopoint(
            $this->startLatitude,
            $this->startLongitude
        );

        $this->assertEquals($this->startLatitude, $startPoint->getLatitude());
        $this->assertEquals($this->startLongitude, $startPoint->getLongitude());
    }

    /**
     * @test
     */
    public function unitCanBeSetSuccessfully()
    {
        $startPoint = new \WeeJames\Geotools\Geopoint(
            $this->startLatitude,
            $this->startLongitude
        );

        $startPoint->in(\WeeJames\Geotools\Geopoint::GEO_UNIT_KM);

        $this->assertEquals(\WeeJames\Geotools\Geopoint::GEO_UNIT_KM, $startPoint->getUnit());

        $startPoint->in(\WeeJames\Geotools\Geopoint::GEO_UNIT_MILES);

        $this->assertEquals(\WeeJames\Geotools\Geopoint::GEO_UNIT_MILES, $startPoint->getUnit());

    }

    /**
     * @test
     */
    public function targetGeopointCanBeSetSuccessfully()
    {
        $startPoint = new \WeeJames\Geotools\Geopoint(
            $this->startLatitude,
            $this->startLongitude
        );

        $targetPoint = new \WeeJames\Geotools\Geopoint(
            $this->targetLatitude,
            $this->targetLongitude
        );

        $startPoint->to($targetPoint);

        $this->assertEquals($targetPoint, $startPoint->getTarget());
    }

    /**
     * @test
     */
    public function algorithmCanBeSetSuccessfully()
    {
        $startPoint = new \WeeJames\Geotools\Geopoint(
            $this->startLatitude,
            $this->startLongitude
        );

        $startPoint->using(\WeeJames\Geotools\Geopoint::ALGORITHM_FLAT);

        $this->assertEquals(\WeeJames\Geotools\Geopoint::ALGORITHM_FLAT, $startPoint->getAlgorithm());

        $startPoint->using(\WeeJames\Geotools\Geopoint::ALGORITHM_HAVERSINE);

        $this->assertEquals(\WeeJames\Geotools\Geopoint::ALGORITHM_HAVERSINE, $startPoint->getAlgorithm());
    }
}
