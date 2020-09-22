<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\BookingType;
use App\Entity\Booking;
use App\Repository\BookingRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Security;




class DemandeController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
     * @Route("/profile", name="profile")
     * @param BookingRepository $bookingRepository
     * @param Request $request
     * @return Response
     */
    public function index(BookingRepository $bookingRepository, Request $request): Response
    {
        $id =$this->getUser()->getId();
        return $this->render('demande/index.html.twig', [
            'bookings' => $bookingRepository->findBookingForOne($id),
            'asks' => $bookingRepository->findaskForOne($id),
        ]);
    }

    /**
     * @Route("/profile/demande", name="demande",methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function form(Request $request){
        $demande = new Booking();
        $user = $this->security->getUser();
        //insertion du nom de l'assiciation avec les valeurs de session de l'utilisateur
        $demande->setNameAssosiation($user);
        $form = $this->createForm(BookingType::class,$demande);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $demande = $form->getData();
            $title = $demande->getTitle();
            $new = htmlspecialchars($title, ENT_QUOTES);
            $demande->setTitle($new);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($demande);
            $entityManager->flush();
            $this->addFlash('success', 'Votre demande à bien était enregistrée');
            return $this->redirectToRoute('profile');
        }
        return $this->render('demande/demande.html.twig', [
            'demande' => $demande,
            'form' => $form->createView()
        ]);
    }
}
