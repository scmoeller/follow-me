<?php
/**
 * Created by PhpStorm.
 * User: stefanchristophmoller
 * Date: 28.10.18
 * Time: 17:33
 */

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;

/**
 * Represents an Airline.
 *
 * @package AppBundle\Entity
 */
class Airline
{
    /**
     * @var string
     */
    private $icaoCode;

    /**
     * @var string
     */
    private $name;

    /**
     * @var ArrayCollection
     */
    private $bases;

    /**
     * @var ArrayCollection
     */
    private $aircraftTypes;

    /**
     * Constructs the Airline.
     *
     * @param $icaoCode
     * @param $name
     * @param Airport $homebase
     */
    public function __construct($icaoCode, $name, Airport $homebase)
    {
        $this->icaoCode = $icaoCode;

        $this->name = $name;

        $this->bases = new ArrayCollection();

        $this->addBase($homebase, true);
    }

    /**
     * @return string
     */
    public function getIcaoCode()
    {
        return $this->icaoCode;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Adds a Base.
     *
     * @param Airport $airport
     * @param bool $homebase
     */
    public function addBase(Airport $airport, $homebase = false)
    {
        $base = new Base($airport, $homebase);

        $this->bases->set($airport->getIcaoCode(), $base);
    }

    /**
     * Gets the Bases.
     *
     * @return array
     */
    public function getBases()
    {
        $bases = $this->bases->getValues();

        $basesArray = [];

        foreach ($bases as $currentBase) {
            $basesArray[] = [
                'airport'   => $currentBase->getAirport(),
                'homebase'  => $currentBase->isHomebase()
            ];
        }

        return $basesArray;
    }

    public function removeBase(Airport $airport)
    {
        $this->bases->remove($airport->getIcaoCode());
    }

    /**
     * @param AircraftType $aircraftType
     * @param $amount
     */
    public function addAircraftType(AircraftType $aircraftType, $amount)
    {
        $airlineAircraftType = new AirlineAircraftType($aircraftType, $amount);

        $this->aircraftTypes->set($aircraftType->getIcaoCode(), $airlineAircraftType);
    }
}