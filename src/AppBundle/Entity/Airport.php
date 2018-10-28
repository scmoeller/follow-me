<?php
/**
 * Created by PhpStorm.
 * User: stefanchristophmoller
 * Date: 28.10.18
 * Time: 12:22
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * Represents an Airport.
 *
 * @ORM\Entity
 * @package AppBundle\Entity
 */
class Airport
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=4)
     *
     * @var string
     */
    private $icaoCode;

    /**
     * @ORM\Column(type="string", length=3)
     *
     * @var string
     */
    private $iataCode;

    /**
     * @ORM\Column(type="string", length=64)
     *
     * @var string
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\City")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     *
     * @var City
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    private $passengers;

    public function __construct($icaoCode, $iataCode, $name, City $city, $passengers)
    {
        $this->icaoCode = $icaoCode;

        $this->iataCode = $iataCode;

        $this->name  = $name;

        $this->city = $city;

        $this->setPassengers($passengers);
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
    public function getIataCode()
    {
        return $this->iataCode;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return int
     */
    public function getPassengers()
    {
        return $this->passengers;
    }


    public function setPassengers($passengers)
    {
        $this->passengers = $passengers;
    }
}