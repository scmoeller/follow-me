<?php
/**
 * Created by PhpStorm.
 * User: stefanchristophmoller
 * Date: 28.10.18
 * Time: 20:41
 */

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Airline;
use PHPUnit\Framework\TestCase;

class AirlineTest extends TestCase
{
    /**
     * @param $icaoCode
     * @param $name
     *
     * @dataProvider provideAirlines
     */
    public function test__construct($icaoCode, $name)
    {
        $airline = new Airline($icaoCode, $name);

        $this->assertEquals($icaoCode, $airline->getIcaoCode());
        $this->assertEquals($name, $airline->getName());
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
        return [
            ['SWA', 'Southwest Airlines'],
            ['UAE', 'Emirates'],
            ['CES', 'China Eastern Airlines']
        ];
    }
}
