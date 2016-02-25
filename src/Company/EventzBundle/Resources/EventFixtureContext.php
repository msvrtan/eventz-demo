<?php
namespace Company\EventzBundle\Resources;

use Company\EventzBundle\Entity\Event;
use Resources\Behat\CleanDbTrait;
use Resources\Behat\DefaultContext;
use Resources\Behat\DomainContext;

class EventFixtureContext extends DefaultContext
{
    /**
     * @When there are :count events
     */
    public function thereAreEvents($count)
    {
        for ($i = 1; $i <= $count; ++$i) {
            $event = new Event();
            $event->setName('Event Number #'.$i)
                ->setEventDate(new \DateTime('tomorrow'));

            $this->getEntityManager()->persist($event);
            $this->getEntityManager()->flush();
        }
    }
}
