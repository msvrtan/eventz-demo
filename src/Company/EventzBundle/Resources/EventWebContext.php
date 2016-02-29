<?php
namespace Company\EventzBundle\Resources;

use Resources\Behat\CleanDbTrait;
use Resources\Behat\WebContext;

class EventWebContext extends WebContext
{
    /**
     * @When I am on :eventName event
     */
    public function iAmOnEvent($eventName)
    {
        $event = $this->getEventRepo()->findOneByName($eventName);

        $this->visitPath('/events/'.$event->getId());
    }

    /**
     * @When I am on :eventName events :ticketTypeName ticket page
     */
    public function iAmOnEventsTicketPage($eventName, $ticketTypeName)
    {
        $event = $this->getEventRepo()->findOneByName($eventName);

        $ticketType = $this->getTicketTypeRepo()->findOneBy(
            [
                'event' => $event,
                'name'  => $ticketTypeName,
            ]
        );

        $this->visitPath('/events/'.$event->getId().'/ticket-type/'.$ticketType->getId());
    }

    /**
     * @Then I should see list of :count events
     */
    public function iShouldSeeListOfEvents($count)
    {
        for ($i = 1; $i <= $count; ++$i) {
            $this->assertPageContainsText('Event Number #'.$i);
        }
    }

    /**
     * @When I click on :eventTitle
     */
    public function iClickOn($eventTitle)
    {
        $this->clickLink($eventTitle);
    }

    private function getEventRepo()
    {
        return $this->getEntityManager()->getRepository('CompanyEventzBundle:Event');
    }

    private function getTicketTypeRepo()
    {
        return $this->getEntityManager()->getRepository('CompanyEventzBundle:TicketType');
    }
}
