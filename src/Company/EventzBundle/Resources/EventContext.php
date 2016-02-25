<?php
namespace Company\EventzBundle\Resources;

use Resources\Behat\DomainContext;
use Resources\Behat\WebContext;

class EventContext extends DomainContext
{
    /**
     * @Given I am on homepage
     */
    public function iAmOnHomepage()
    {
        //Empty, does nothing since this is domain related context.
    }

    /**
     * @Then I should see list of :count events
     */
    public function iShouldSeeListOfEvents($count)
    {
        $eventsRepo = $this->getEntityManager()->getRepository('CompanyEventzBundle:Event');

        $allEvents = $eventsRepo->findAll();

        if ($count != count($allEvents)) {
            throw new \Exception('Expected '.$count.' but found '.count($allEvents).' events');
        }
    }
}
