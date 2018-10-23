<?php
/**
 * Created by PhpStorm.
 * User: stefanchristophmoller
 * Date: 23.10.18
 * Time: 10:24
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Represents a Country.
 *
 * @ORM\Entity
 * @package AppBundle\Entity
 */
class Country
{
    /**
     * 3-letter ISO-Code
     *
     * @ORM\Id
     * @ORM\Column(type="string", length=3)
     * @var string
     */
    private $isoCode;

    /**
     * Name
     *
     * @ORM\Column(type="string", length=64)
     * @var string
     */
    private $name;

    /**
     * @param $isoCode
     * @param $name
     */
    public function __construct($isoCode, $name)
    {
        if (strlen($isoCode) == 3) {
            $this->isoCode = $isoCode;
        } else {
            throw new \DomainException('ISO-Code of a Country must be of 3 letters.');
        }

        if (strlen($name) >= 3 && strlen($name) <= 64) {
            $this->name = $name;
        } else {
            throw new \DomainException('Name of a Country must be not longer than 64 characters.');
        }
    }

    /**
     * @return string
     */
    public function getIsoCode()
    {
        return $this->isoCode;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}