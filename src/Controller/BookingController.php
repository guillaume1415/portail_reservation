<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\BookingSearch;
use App\Form\BookingSearchType;
use App\Form\BookingType;
use App\Repository\BookingRepository;
use App\Repository\DemandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use CalendarBundle\Controller\CalendarController;


class BookingController extends AbstractController
{
    /**
     * @Route("/admin/booking", name="booking_index")
     * @param BookingRepository $bookingRepository
     * @param Request $request
     * @param DemandeRepository $DemandeRepository
     * @return Response
     */
    public function index(BookingRepository $bookingRepository, Request $request): Response
    {
        $search = new BookingSearch;

        $form = $this->createForm(BookingSearchType::class, $search);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

//            $this->addFlash('success', 'Votre message a été envoyé avec succès.');
        }
        return $this->render('booking/index.html.twig', [
            'bookings' => $bookingRepository->findBooking(),
            'demandes' => $bookingRepository->findAskBooking(),
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/booking/new", name="booking_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($booking);
            $entityManager->flush();
            $this->addFlash('success', 'Votre modification à bien était enregistrée');
            return $this->redirectToRoute('booking_index');
        }

        return $this->render('booking/new.html.twig', [
            'booking' => $booking,
            'form' => $form->createView(),
        ]);
    }


    public function calendar(): Response
    {
        return $this->render('booking/calendar.html.twig');
    }


    /**
     * @Route("/admin/booking/{id}", name="booking_show", methods={"GET"})
     */
    public function show(Booking $booking): Response
    {
        return $this->render('booking/show.html.twig', [
            'booking' => $booking,
        ]);
    }

    /**
     * @Route("/admin/booking/edit/{id}", name="booking_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Booking $booking): Response
    {
        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Votre modification à bien était enregistrée');
            return $this->redirectToRoute('booking_index');
        }

        return $this->render('booking/edit.html.twig', [
            'booking' => $booking,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/booking/delete/{id}", name="booking_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Booking $booking): Response
    {
        if ($this->isCsrfTokenValid('delete' . $booking->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($booking);
            $entityManager->flush();
            $this->addFlash('success', 'supprimé avec succès');
        }

        return $this->redirectToRoute('booking_index');
    }


}
