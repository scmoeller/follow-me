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

    public function __construct($icaoCode, $name)
    {
        $this->icaoCode = $icaoCode;

        $this->name = $name;
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


    public function addBase(Airport $airport, $homebase = false)
    {
        $base = new Base($airport, $homebase);

        $this->bases->set($airport->getName(), $base);
    }

    public function removeBase(Airport $airport)
    {
        $this->bases->remove($airport->getName());
    }

    /**
     * @param Airport $airport
     * @return mixed|null
     */
    public function getBase(Airport $airport)
    {
        return $this->bases->get($airport->getName());
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