<?php

namespace WeeJames\Geotools;

class Tools {
    // available units
    const GEO_UNIT_KM = 'km';
    const GEO_UNIT_MILES = 'miles';

    // available algorithms
    const ALGORITHM_FLAT = 'flat';
    const ALGORITHM_HAVERSINE = 'haversine';

    const EARTH_RADIUS_KM = 6371;
    const EARTH_RADIUS_MILES = 3959;

    // available operations
    const DISTANCE_OPERATION = 'distance';

    public static function distanceBetween(Geopoint $pointA, Geopoint $pointB, $algorithm, $units)
    {
        switch ($algorithm) {
			case 'haversine':
				$theta = ($pointA->getLongitude() - $pointB->getLongitude());

				$dist = sin(
                            deg2rad($pointA->getLatitude())
                            ) *
                        sin(
                            deg2rad($pointB->getLatitude())
                            ) +
                            cos(deg2rad($pointA->getLatitude())
                            ) *
                        cos(
                            deg2rad($pointB->getLatitude())
                            ) *
                        cos(
                            deg2rad($theta)
                        );

                $dist = acos($dist);

				$distance = rad2deg($dist);
			break;
			case 'flat':
			default:
				$distanceEW = ($pointB->getLongitude() - $pointA->getLongitude()) *
                    cos($pointA->getLatitude());
				$distanceNS = $pointB->getLatitude() - $pointA->getLatitude();

				$distance = sqrt(
                    ($distanceEW * $distanceEW) +
                    ($distanceNS * $distanceNS)
                );

			break;
		}

        switch($units) {
            case self::GEO_UNIT_KM:
                $radius = self::EARTH_RADIUS_KM;
                break;
            case self::GEO_UNIT_MILES:
                $radius = self::EARTH_RADIUS_MILES;
                break;
        }

		$distance *= 2 * pi() * $radius / 360.0;

		return $distance;
    }

}
