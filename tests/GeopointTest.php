<?php

namespace WeeJames\Geotools\Tests;

class GeopointTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function geopointCanBeCreatedSuccessfully()
    {
        $latitude = 55.8580;
        $longitude = 4.2590;

        $point = new \WeeJames\Geotools\Geopoint($latitude, $longitude);

        $this->assertEquals($latitude, $point->getLatitude());
        $this->assertEquals($longitude, $point->getLongitude());
    }

}
