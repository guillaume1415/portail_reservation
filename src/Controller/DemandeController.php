<?php

namespace App\Controller;

use App\Entity\Demande;
use App\Entity\Booking;
use App\Form\DemandeType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class DemandeController extends AbstractController
{
    /**
     * @Route("/demande", name="demande")
     */
    public function formIndex()

    {
        return $this->render('demande/index.html.twig');
    }

    /**
     * @Route("/demadnde", name="demanhde")
     */
    public function forddm(Request $request)

    {
        $demande = new Demande();

        $form = $this->createForm(DemandeType::class,$demande);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid){
            $demande = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($demande);
            $entityManager->flush();

        }

        return $this->render('demande/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
