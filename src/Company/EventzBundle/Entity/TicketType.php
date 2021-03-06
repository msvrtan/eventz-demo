<?php
namespace Company\EventzBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * TicketType.
 */
class TicketType
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $ticketsSoldCounter = 0;

    /**
     * @var int
     */
    private $ticketsAvailableCounter = 0;

    /**
     * @var int
     */
    private $ticketsWantedCounter = 0;

    /**
     * @var Event
     */
    private $event;
    private $wantedTickets;

    /**
     * Event constructor.
     */
    public function __construct()
    {
        $this->wantedTickets = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return TicketType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set ticketsSoldCounter.
     *
     * @param int $ticketsSoldCounter
     *
     * @return TicketType
     */
    public function setTicketsSoldCounter($ticketsSoldCounter)
    {
        $this->ticketsSoldCounter = $ticketsSoldCounter;

        return $this;
    }

    /**
     * Get ticketsSoldCounter.
     *
     * @return int
     */
    public function getTicketsSoldCounter()
    {
        return $this->ticketsSoldCounter;
    }

    /**
     * Set ticketsAvailableCounter.
     *
     * @param int $ticketsAvailableCounter
     *
     * @return TicketType
     */
    public function setTicketsAvailableCounter($ticketsAvailableCounter)
    {
        $this->ticketsAvailableCounter = $ticketsAvailableCounter;

        return $this;
    }

    /**
     * Get ticketsAvailableCounter.
     *
     * @return int
     */
    public function getTicketsAvailableCounter()
    {
        return $this->ticketsAvailableCounter;
    }

    public function incrementTicketsWantedCounter($howManyNewTickets)
    {
        $this->ticketsWantedCounter += $howManyNewTickets;
    }

    /**
     * Set ticketsWantedCounter.
     *
     * @param int $ticketsWantedCounter
     *
     * @return TicketType
     */
    public function setTicketsWantedCounter($ticketsWantedCounter)
    {
        $this->ticketsWantedCounter = $ticketsWantedCounter;

        return $this;
    }

    /**
     * Get ticketsWantedCounter.
     *
     * @return int
     */
    public function getTicketsWantedCounter()
    {
        return $this->ticketsWantedCounter;
    }

    /**
     * Set event.
     *
     * @param Event $event
     *
     * @return TicketType
     */
    public function setEvent(Event $event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event.
     *
     * @return int
     */
    public function getEvent()
    {
        return $this->event;
    }

    public function getWantedTickets()
    {
        return $this->wantedTickets;
    }

    public function __toString()
    {
        return $this->name;
    }
}
