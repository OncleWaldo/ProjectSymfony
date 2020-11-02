<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Reservation;
use App\Entity\Salle;
use App\Entity\Equipment;

class UserDashboardController extends AbstractController
{
    /**
     * @Route("/mon-espace", name="mon_espace")
     */

    public function reservations()
    {
        $em = $this->getDoctrine()->getManager();   
        $myresults = $em->getRepository(Reservation::class)->findBy(["user" => $this->getUser() ]);
        return $this->render('mon-espace/userdashboard.html.twig', [
            "myresults" => $myresults,
        ]);
    }

     /**
     * @Route("/mon-espace/reservation/{id}", name="mon_espace_reservation_detail") // version longue
     */

    public function mareservation($id)
    {
        $em = $this->getDoctrine()->getManager();   
        $resultat = $em->getRepository(Reservation::class)->find($id);
        if($this->getUser() !== $resultat->getUser() ) 
        {
           return "vaffenculo";
        }
        return $this->render('mon-espace/reservation.html.twig', [
        "reservation" => $resultat,
        ]);
    }


     /**
     * @Route("/salles_louables", name="salle_louable") 
     */

    public function bookableroom()
    {
        $em = $this->getDoctrine()->getManager();   
        $resultatsalles = $em->getRepository(Salle::class)->findBy(['bookable'=>true]);
        return $this->render('bookable_room.html.twig', [
        "salles" => $resultatsalles,
        ]);
    }

     /**
     * @Route("/les_salles", name="salle_disponible") 
     */

    public function availableroom()
    {
        $em = $this->getDoctrine()->getManager();   
        $salle = $em->getRepository(Salle::class)->findAll();
        return $this->render('available_room.html.twig', [
        "allsalles" => $salle,
        ]);    
    }

     /**
     * @Route("/les_salles/{id}", name="salle_disponible_detail") 
     */
    public function availableroomshow(salle $salle)
    {
        return $this->render('available_room_detail.html.twig', [
        "singlesalle" => $salle,
        ]);    
    }
    


    /**
     * @Route("/mon-espace/reservation/{id}", name="mon_espace_reservation_detail")    //version rapide
     */

    // public function mareservation(Reservation $reservation)
    // {
    //     return $this->render('mon-espace/reservation.html.twig', [
    //     "reservation" => $reservation,
    //     ]);
    // }



    
}
