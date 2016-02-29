<?php
namespace Company\EventzBundle\Resources;

use Resources\Behat\CleanDbTrait;
use Resources\Behat\WebContext;

class EventWebContext extends WebContext
{
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
}
