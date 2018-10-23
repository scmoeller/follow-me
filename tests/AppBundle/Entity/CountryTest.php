<?php
/**
 * Created by PhpStorm.
 * User: stefanchristophmoller
 * Date: 23.10.18
 * Time: 10:28
 */

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Country;
use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    /**
     * @param $isoCode
     * @param $name
     *
     * @dataProvider provideCountries
     */
    public function testConstruct($isoCode, $name)
    {
        $country = new Country($isoCode, $name);

        $this->assertEquals($isoCode, $country->getIsoCode());
        $this->assertEquals($name, $country->getName());
    }

    /**
     * @param $isoCode
     * @param $name
     *
     * @dataProvider provideIsoCodeLengthUnequal3
     */
    public function testIsoCodeLengthUnequal3($isoCode, $name)
    {
        $this->expectException('DomainException');
        $this->expectExceptionMessage('ISO-Code of a Country must be of 3 letters.');

        /** @noinspection PhpUnusedLocalVariableInspection */
        $country = new Country($isoCode, $name);
    }

    /**
     * @param $isoCode
     * @param $name
     *
     * @dataProvider provideCountriesNameLessThan3orGreaterThan64
     */
    public function testNameLengthLessThan3orGreaterThan64($isoCode, $name)
    {
        $this->expectException('DomainException');
        $this->expectExceptionMessage('Name of a Country must be not longer than 64 characters.');

        /** @noinspection PhpUnusedLocalVariableInspection */
        $country = new Country($isoCode, $name);
    }

    public function provideCountries()
    {
        return [
            ['ATG', 'Antigua und Barbuda'],
            ['DEU', 'Deutschland'],
            ['SGS', 'Südgeorgien und die Südlichen Sandwichinseln'],
            ['TON', 'Tonga'],
            ['GBR', 'Vereinigtes Königreich Großbritannien und Nordirland'],
            ['VNM', 'Vietnam']
        ];
    }

    public function provideIsoCodeLengthUnequal3()
    {
        return [
            ['AT', 'Antigua und Barbuda'],
            ['DEUS', 'Deutschland']
        ];
    }

    public function provideCountriesNameLessThan3orGreaterThan64()
    {
        return [
            ['XXX', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam'],
            ['XXX', 'OO']
        ];
    }
}
