<?php
/**
 * Created by PhpStorm.
 * User: stefanchristophmoller
 * Date: 24.10.18
 * Time: 20:24
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;


/**
 * Represents a City.
 *
 * @ORM\Entity
 * @package AppBundle\Entity
 */
class City
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    private $id;

    /**
     * Name
     *
     * @ORM\Column(type="string", length=64)
     * @var string
     */
    private $name;

    /**
     * Country in which the city is.
     * 
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Country")
     * @ORM\JoinColumn(name="country_iso_code", referencedColumnName="iso_code")
     *
     * @var Country
     */
    private $country;

    /**
     * @param $name
     * @param Country $country
     */
    public function __construct($name, Country $country)
    {
        $this->name = $name;

        $this->country = $country;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCountry()
    {
        return $this->country;
    }
}