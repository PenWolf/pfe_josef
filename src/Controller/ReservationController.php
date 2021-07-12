<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationFormType;
use App\Repository\VoitureRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReservationController extends AbstractController
{
    /**
     * @Route("/addreservation/{matricule}", name="addreservation")
     */
    public function addreservation($matricule ,Request $request, VoitureRepository $repo): Response
    {
        $Reservation = new Reservation();
    
        $form = $this->createForm(ReservationFormType::class,$Reservation);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
    {
        if($this->getUser()->getFidele())
            $Reservation->setPrixReservation($Reservation->getPrixReservation() * 0.85);
            
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($Reservation);
        $entityManager->flush();
        $this->addFlash('success', 'Reservation is done !!');
        return $this->redirectToRoute('voitures');
    }
        return $this->render('Reservation/Reservation.html.twig', [
            "form_title" => "Ajouter un Reservation",
            "form_Reservation" => $form->createView(),
            "matricule" => $matricule,
            "voiture" => $repo->findOneBy(['matricule' => $matricule])
        ]);
    }
}
