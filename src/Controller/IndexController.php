<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\Salle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ReservationType;
use App\Form\SalleMaxType;
use Symfony\Component\HttpFoundation\Request;
use Carbon\Carbon;


class IndexController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('index_controller_i/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

     /**
     * @Route("/reservation/reserver", name="reserver")      // render une view
     */
    public function reserver(Request $request)
    {
        
        $form = $this->createForm(ReservationType::class);
        $resultat = null;
        $data = null;
        $datePicked = null;
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
    
            $data = $form->getData();
            $datePicked = new Carbon($data["dates"]->format('Y-m-d H:i:s'));
            $dateStart = $datePicked->copy()->startOfDay();
            $dateEnd = $datePicked->copy()->endOfDay();

            $em = $this->getDoctrine()->getManager();   
            $resultat = $em->getRepository(Reservation::class)->findResa( $data["etes_vous"] ,$data["salles"], $dateStart, $dateEnd );
        }
        

        return $this->render('reservation/reserver.html.twig',
        [ 
            "form" => $form->createView(),
            "data" => $data,
            "resultat" => $resultat,
            "date" => $datePicked
        ]);
        
    }

    /**
     * @Route("/salle/maxpeople", name="maxpeople")      // render une view
     */

    public function findMaxPeople(Request $request)
    {
        
        $form = $this->createForm(SalleMaxType::class);
        $resultat = null;
        $data = null;
        $datePicked = null;
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
    
            $data = $form->getData();
            $datePicked = new Carbon($data["dates"]->format('Y-m-d H:i:s'));
            $dateStart = $datePicked->copy()->startOfDay();
            $dateEnd = $datePicked->copy()->endOfDay();

            $em = $this->getDoctrine()->getManager();   

            $resultat = $em->getRepository(Salle::class)->findByIndisponible($data["Personnes_Max"], $dateStart, $dateEnd);
        }
        

        return $this->render('salle/maxpeople.html.twig',
        [ 
            "form" => $form->createView(),
            "data" => $data,
            "resultat" => $resultat,
            "date" => $datePicked
        ]);
        
    }
    
}
    // "salle"  => $data["salles"]->getName(),
    //             "userGroup" =>  $data["etes_vous"]->getName() 