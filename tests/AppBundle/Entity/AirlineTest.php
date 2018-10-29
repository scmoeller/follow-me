<?php
/**
 * Created by PhpStorm.
 * User: stefanchristophmoller
 * Date: 28.10.18
 * Time: 20:41
 */

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Airline;
use AppBundle\Entity\Airport;
use AppBundle\Entity\City;

use AppBundle\Entity\Country;
use PHPUnit\Framework\TestCase;

class AirlineTest extends TestCase
{
    /**
     * @param $icaoCode
     * @param $name
     * @param Airport $homebase
     * @param $expectedBases
     * @dataProvider provideAirlines
     */
    public function test__construct($icaoCode, $name, Airport $homebase, $expectedBases)
    {
        $airline = new Airline($icaoCode, $name, $homebase);

        $this->assertEquals($icaoCode, $airline->getIcaoCode());
        $this->assertEquals($name, $airline->getName());

        $actualBases = $airline->getBases();

        $this->assertEquals($expectedBases, $actualBases);
    }

    public function testRemoveBase()
    {
        $this->markTestIncomplete();
    }

    public function testAddBase()
    {
        $this->markTestIncomplete();
    }

    public function testGetBase()
    {
        $this->markTestIncomplete();
    }

    public function testAddAircraftType()
    {
        $this->markTestIncomplete();
    }

    public function provideAirlines()
    {
        $swaHomebase = new Airport(
            'KDAL',
            'DAL',
            'Dallas Love Field',
            new City('Dallas', new Country('USA', 'Vereinigte Staaten von Amerika')),
            15723617
        );

        $expectedBase[] = [
            'airport' => $swaHomebase,
            'homebase' => true
        ];

//        $uaeHomebase = new Airport(
//            'OMDB',
//            'DXB',
//            'Dubai International Airport',
//            new City('Dubai', new Country('ARE', 'Vereinigte Arabische Emirate')),
//            88242099
//        );
//
//        $cesHomebase = new Airport(
//            'ZSPD',
//            'PVG',
//            'Shanghai Pudong International Airport',
//            new City('Shanghai', new Country('CHN', 'China, Volksrepublik')),
//            70001237
//        );

        return [
            ['SWA', 'Southwest Airlines', $swaHomebase, $expectedBase]
//            ['UAE', 'Emirates', $uaeHomebase],
//            ['CES', 'China Eastern Airlines', $cesHomebase]
        ];
    }
}
