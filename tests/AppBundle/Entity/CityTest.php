<?php
/**
 * Created by PhpStorm.
 * User: stefanchristophmoller
 * Date: 24.10.18
 * Time: 20:07
 */

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\City;
use AppBundle\Entity\Country;

use PHPUnit\Framework\TestCase;

class CityTest extends TestCase
{
    /**
     * @param $name
     * @param Country $country
     *
     * @dataProvider provideCities
     */
    public function testConstruct($name, Country $country)
    {
        $city = new City($name, $country);

        $this->assertEquals($name, $city->getName());
        $this->assertEquals($country, $city->getCountry());
    }

    /**
     * @return array
     */
    public function provideCities()
    {
        return [
            ['Dubai', new Country('ARE', 'Vereinigte Arabische Emirate')],
            ['Frankfurt am Main', new Country('DEU', 'Deutschland')],
            ['Guangzhou', new Country('CHN', 'China, Volksrepublik')],
            ['Atlanta', new Country('USA', 'Vereinigte Staaten von Amerika')],
            ['Zürich', new Country('CHE', 'Schweiz')]
        ];
    }
}
