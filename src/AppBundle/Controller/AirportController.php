<?php
/**
 * Created by PhpStorm.
 * User: stefanchristophmoller
 * Date: 28.10.18
 * Time: 14:21
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Airport;
use AppBundle\Entity\City;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AirportController extends Controller
{
    /**
     * @Route("/airports")
     */
    public function indexAction()
    {
        $cityRepository = $this->getDoctrine()->getRepository(City::class);

        $cities = $cityRepository->findAll();

        $airportRepository = $this->getDoctrine()->getRepository(Airport::class);

        $airports = $airportRepository->findAll();

        return $this->render('airport.html.twig', ['cities' => $cities, 'airports' => $airports]);
    }

    /**
     * @Route("/airports/create")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function createAction(Request $request)
    {
        $icaoCode = $request->request->get('icaoCode');

        $iataCode = $request->request->get('iataCode');

        $name = $request->request->get('name');

        $cityRepository = $this->getDoctrine()->getRepository(City::class);

        $city = $cityRepository->find($request->request->get('cityId'));

        $passengers = $request->request->get('passengers');

        $airport = new Airport($icaoCode, $iataCode, $name, $city, $passengers);

        $manager = $this->getDoctrine()->getManager();

        $manager->persist($airport);
        $manager->flush();

        return $this->redirect('/airports');
    }
}