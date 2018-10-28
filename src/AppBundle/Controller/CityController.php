<?php
/**
 * Created by PhpStorm.
 * User: stefanchristophmoller
 * Date: 25.10.18
 * Time: 10:46
 */

namespace AppBundle\Controller;

use AppBundle\Entity\City;
use AppBundle\Entity\Country;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CityController extends Controller
{
    /**
     * @Route("/cities")
     */
    public function indexAction()
    {
        $cityRepository = $this->getDoctrine()->getRepository(City::class);

        $cities = $cityRepository->findAll();

        $countryRepository = $this->getDoctrine()->getRepository(Country::class);

        $countries = $countryRepository->findAll();

        return $this->render('city.html.twig', ['cities' => $cities, 'countries' => $countries]);
    }

    /**
     * @Route("/cities/create")
     */
    public function createAction(Request $request)
    {
        $cityName = $request->request->get('cityName');
        $countryIsoCode = $request->request->get('countryIsoCode');

        $countryRepository = $this->getDoctrine()->getRepository(Country::class);

        $country = $countryRepository->find($countryIsoCode);

        $city = new City($cityName, $country);

        $manager = $this->getDoctrine()->getManager();

        $manager->persist($city);
        $manager->flush();

        return $this->redirect('/cities');
    }
}