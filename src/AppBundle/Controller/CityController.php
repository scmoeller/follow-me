<?php
/**
 * Created by PhpStorm.
 * User: stefanchristophmoller
 * Date: 25.10.18
 * Time: 10:46
 */

namespace AppBundle\Controller;

use AppBundle\Entity\City;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

        if (empty($cities)) {
            return new Response("No cities available yet.");
        } else {
            return new Response('');
        }
    }

    public function createAction(Request $request)
    {

    }
}