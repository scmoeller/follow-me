<?php
/**
 * Created by PhpStorm.
 * User: stefanchristophmoller
 * Date: 28.10.18
 * Time: 19:04
 */

namespace AppBundle\Entity;


class Base
{
    /**
     * @var Airport
     */
    private $airport;

    /**
     * @var boolean
     */
    private $homebase;

    public function __construct(Airport $airport, $homebase = false)
    {
        $this->airport = $airport;

        $this->homebase = $homebase;
    }

    /**
     * @return Airport
     */
    public function getAirport()
    {
        return $this->airport;
    }

    /**
     * @return bool
     */
    public function isHomebase()
    {
        return $this->homebase;
    }
}