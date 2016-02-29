<?php
namespace Company\EventzBundle\Resources;

use Company\EventzBundle\Entity\Event;
use Company\EventzBundle\Entity\TicketType;
use Company\EventzBundle\Entity\WantedTicket;
use Resources\Behat\CleanDbTrait;
use Resources\Behat\DefaultContext;
use Resources\Behat\DomainContext;

class EventFixtureContext extends DefaultContext
{
    use CleanDbTrait;

    /**
     * @When there are :count events
     */
    public function thereAreEvents($count)
    {
        $this->cleanDb();

        for ($i = 1; $i <= $count; ++$i) {
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

            $this->getEntityManager()->persist($event);
            $this->getEntityManager()->persist($ticketType);
            $this->getEntityManager()->persist($ticketTypePremium);
            $this->getEntityManager()->persist($ticketTypeGold);
            $this->getEntityManager()->persist($ticketTypeVip);
            $this->getEntityManager()->persist($oneVipTicketWanted);
            $this->getEntityManager()->persist($threePremiumTicketsWanted);
            $this->getEntityManager()->flush();
        }
    }
}
