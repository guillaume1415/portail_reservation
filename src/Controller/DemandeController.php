<?php

namespace App\Controller;

use App\Entity\Demande;
use App\Form\DemandeType;
use App\Entity\Booking;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DemandeController extends AbstractController
{

    /**
     * @Route("/", name="index")
     */
    public function Index()

    {
        return $this->render('demande/index.html.twig');
    }

    /**
     * @Route("/profile/demande", name="demande",methods={"GET","POST"})
     */
    public function form(Request $request)

    {
        $demande = new Demande();

        $form = $this->createForm(DemandeType::class,$demande);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $demande = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($demande);
            $entityManager->flush();

        }

        return $this->render('demande/demande.html.twig', [
            'demande' => $demande,
            'form' => $form->createView()
        ]);
    }
}
