<?php

namespace App\EventSubscriber;

use App\Repository\BookingRepository;
use CalendarBundle\CalendarEvents;
use CalendarBundle\Entity\Event;
use CalendarBundle\Event\CalendarEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class CalendarSubscriber implements EventSubscriberInterface
{
    private $bookingRepository;
    private $router;

    public function __construct(
        BookingRepository $bookingRepository,
        UrlGeneratorInterface $router
    )
    {
        $this->bookingRepository = $bookingRepository;
        $this->router = $router;
    }

    public static function getSubscribedEvents()
    {
        return [
            CalendarEvents::SET_DATA => 'onCalendarSetData',
        ];
    }

    public function onCalendarSetData(CalendarEvent $calendar)
    {
        $start = $calendar->getStart();
        $end = $calendar->getEnd();
        $filters = $calendar->getFilters();


        $bookings = $this->bookingRepository
            ->createQueryBuilder('b')
            ->innerJoin("b.Batiment", "u")
                ->where('b.beginAt BETWEEN :start and :end OR b.endAt BETWEEN :start and :end')
                ->andWhere('b.state = true')
                ->setParameter('start', $start->format('Y-m-d H:i:s'))
                ->setParameter('end', $end->format('Y-m-d H:i:s'));


        if (!empty($filters['batiment'])) {
            $bookings = $bookings
                ->andWhere('u.id = :batiment')
                ->setParameter('batiment', $filters['batiment']);
        }
        if (!empty($filters['title'])) {
            $bookings = $bookings
                ->andWhere('b.title = :title')
                ->setParameter('title', $filters['title']);

        }
        $bookings=$bookings->getQuery()
            ->getResult();

//         Modify the query to fit to your entity and needs
//         Change booking.beginAt by your start date property
//        $bookings = $this->bookingRepository
//            ->createQueryBuilder('b')
//            ->innerJoin("b.Batiment", "u")
//            ->where('b.beginAt BETWEEN :start and :end OR b.endAt BETWEEN :start and :end')
//            ->setParameter('start', $start->format('Y-m-d H:i:s'))
//            ->setParameter('end', $end->format('Y-m-d H:i:s'))
//            ->getQuery()
//            ->getResult()
//        ;
        foreach ($bookings as $booking) {
            // this create the events with your data (here booking data) to fill calendar
            $bookingEvent = new Event(
                $booking->getTitle(),
                $booking->getBeginAt(),

                $booking->getEndAt()
            );

            $bookingEvent->setOptions([
                'backgroundColor' => 'red',
                'borderColor' => 'red',
            ]);
            $bookingEvent->addOption(
                'url',
                $this->router->generate('booking_show', [
                    'id' => $booking->getId(),
                ])
            );

            // finally, add the event to the CalendarEvent to fill the calendar
            $calendar->addEvent($bookingEvent);
        }
    }
}