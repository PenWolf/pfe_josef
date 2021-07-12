<?php

namespace App\Controller;

use App\Entity\Voiture;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoitureController extends AbstractController
{
    /**
     * @Route("/voitures", name="voitures")
     */
    public function voitures(): Response
    {
        $voitures = $this->getDoctrine()->getRepository(Voiture::class)->findAll();
        return $this->render('voiture/voiture.html.twig', [
            'voitures' => $voitures,
        ]);
    }
}
