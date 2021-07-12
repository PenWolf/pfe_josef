<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ReservationController extends AbstractController
{
    /**
     * @Route("/addreservation/{matricule}", name="addreservation")
     */
    public function addreservation($matricule ,Request $request): Response
    {
        $Reservation = new Reservation();
    
        $form = $this->createForm(ReservationFormType::class,$Reservation);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Reservation);
        $entityManager->flush();
    }

        return $this->render('Reservation/Reservation.html.twig', [
            "form_title" => "Ajouter un Reservation",
            "form_Reservation" => $form->createView(),
            "matricule" => $matricule
        ]);
    }
}
