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

        $startPoint->in(\WeeJames\Geotools\Tools::GEO_UNIT_KM);

        $this->assertEquals(\WeeJames\Geotools\Tools::GEO_UNIT_KM, $startPoint->getUnit());

        $startPoint->in(\WeeJames\Geotools\Tools::GEO_UNIT_MILES);

        $this->assertEquals(\WeeJames\Geotools\Tools::GEO_UNIT_MILES, $startPoint->getUnit());

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

        $startPoint->using(\WeeJames\Geotools\Tools::ALGORITHM_FLAT);

        $this->assertEquals(\WeeJames\Geotools\Tools::ALGORITHM_FLAT, $startPoint->getAlgorithm());

        $startPoint->using(\WeeJames\Geotools\Tools::ALGORITHM_HAVERSINE);

        $this->assertEquals(\WeeJames\Geotools\Tools::ALGORITHM_HAVERSINE, $startPoint->getAlgorithm());
    }


    /**
     * @test
     */
    public function canSetDistanceOperation()
    {
        $startPoint = new \WeeJames\Geotools\Geopoint(
            $this->startLatitude,
            $this->startLongitude
        );

        $startPoint->distance();

        $this->assertEquals(\WeeJames\Geotools\Tools::DISTANCE_OPERATION, $startPoint->getOperation());
    }

    /**
     * @test
     */
    public function distanceUsingFlatAlgorithm()
    {
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
                                ->using(\WeeJames\Geotools\Tools::ALGORITHM_FLAT)
                                ->is();

        $this->assertEquals(6210.78, $distanceToTarget, '', 0.2);
    }

    /**
     * @test
     */
    public function distanceUsingHaversineAlgorithm()
    {
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

        $this->assertEquals(5181.45, $distanceToTarget, '', 0.2);
    }
}
