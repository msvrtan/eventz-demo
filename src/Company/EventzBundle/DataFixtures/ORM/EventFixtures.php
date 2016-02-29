<?php
namespace Company\EventzBundle\DataFixtures\ORM;

use Company\EventzBundle\Entity\Event;
use Company\EventzBundle\Entity\TicketType;
use Company\EventzBundle\Entity\WantedTicket;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class EventFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 2; ++$i) {
            $event = new Event();
            $event->setName('Event Number #'.$i)
                ->setEventDate(new \DateTime('tomorrow'));

            $ticketType = new TicketType();
            $ticketType->setName('Seats')
                ->setEvent($event);

            $ticketTypePremium = new TicketType();
            $ticketTypePremium->setName('Premium seat')
                ->setEvent($event);

            $ticketTypeGold = new TicketType();
            $ticketTypeGold->setName('Gold seat')
                ->setEvent($event);

            $ticketTypeVip = new TicketType();
            $ticketTypeVip->setName('VIP')
                ->setEvent($event);

            $oneVipTicketWanted = new WantedTicket();
            $oneVipTicketWanted->setEvent($event)
                ->setTicketType($ticketTypeVip)
                ->setTicketsNeeded(1)
                ->setMaximumPricePerTicket(10)
                ->setNotificationEmail('john.doe@example.com');

            $event->addNewWantedTickets($oneVipTicketWanted);

            $threePremiumTicketsWanted = new WantedTicket();
            $threePremiumTicketsWanted->setEvent($event)
                ->setTicketType($ticketTypePremium)
                ->setTicketsNeeded(3)
                ->setMaximumPricePerTicket(10)
                ->setNotificationEmail('john.doe@example.com');

            $event->addNewWantedTickets($threePremiumTicketsWanted);

            $manager->persist($event);
            $manager->persist($ticketType);
            $manager->persist($ticketTypePremium);
            $manager->persist($ticketTypeGold);
            $manager->persist($ticketTypeVip);
            $manager->persist($oneVipTicketWanted);
            $manager->persist($threePremiumTicketsWanted);
            $manager->flush();
        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 20;
    }
}
