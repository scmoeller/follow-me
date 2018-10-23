<?php
/**
 * Created by PhpStorm.
 * User: stefanchristophmoller
 * Date: 23.10.18
 * Time: 12:19
 */

namespace AppBundle\DataFixtures\ORM;

//use Doctrine\Bundle\FixturesBundle\Fixture;
use AppBundle\Entity\Country;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class CountryFixture implements ORMFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $file = file(__DIR__ . '/../Countries.csv');

        foreach ($file as $item) {
            $data = str_getcsv($item, ';');

            $country = new Country($data[0], $data[1]);

            $manager->persist($country);
            $manager->flush();
        }
    }
}