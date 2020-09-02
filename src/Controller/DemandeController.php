<?php

namespace App\Controller;

use App\Entity\Demande;
use App\Entity\User;
use App\Form\BookingType;
use App\Form\DemandeType;
use App\Entity\Booking;
use App\Repository\UserRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;



class DemandeController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
     * @Route("/", name="index")
     */
    public function Index()

    {
        return $this->render('demande/index.html.twig');
    }

    /**
     * @Route("/profile/demande", name="demande",methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function form(Request $request)

    {
        $demande = new Booking();
        $user = $this->getUser();
//        $user = $this->security->getUser();
//        $email = $user->getEmail();

//        $product = $this->getDoctrine()
//            ->getRepository(User::class)
//            ->findOneBySomeField($email);
//        $id_user= $product->getId();
//        var_dump($user);
        $demande->setNameAssosiation($user);
//        echo($demande->getNameAssosiation());

        $form = $this->createForm(BookingType::class,$demande);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $demande = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($demande);
            $entityManager->flush();
            $this->addFlash('success', 'Votre demande à bien était enregistrée');
            return $this->redirectToRoute('index');
        }

        return $this->render('demande/demande.html.twig', [
            'demande' => $demande,
            'form' => $form->createView()
        ]);
    }
}
