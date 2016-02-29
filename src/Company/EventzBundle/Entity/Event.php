<?php
namespace Company\EventzBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Event.
 */
class Event
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
     * @var \DateTime
     */
    private $eventDate;

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
     * @var bool
     */
    private $active = 1;

    private $ticketTypes;
    private $wantedTickets;

    /**
     * Event constructor.
     */
    public function __construct()
    {
        $this->ticketTypes   = new ArrayCollection();
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
     * @return Event
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
     * Set eventDate.
     *
     * @param \DateTime $eventDate
     *
     * @return Event
     */
    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;

        return $this;
    }

    /**
     * Get eventDate.
     *
     * @return \DateTime
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }

    /**
     * Set ticketsSoldCounter.
     *
     * @param int $ticketsSoldCounter
     *
     * @return Event
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
     * @return Event
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

    /**
     * Set ticketsWantedCounter.
     *
     * @param int $ticketsWantedCounter
     *
     * @return Event
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
     * Set active.
     *
     * @param bool $active
     *
     * @return Event
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active.
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param TicketType $ticketType
     *
     * @return $this
     */
    public function addTicketType(TicketType $ticketType)
    {
        $this->ticketTypes[] = $ticketType;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getTicketType($id)
    {
        foreach ($this->ticketTypes as $ticketType) {
            if ($ticketType->getId() === $id) {
                return $ticketType;
            }
        }

        return null;
    }

    /**
     * @return ArrayCollection
     */
    public function getTicketTypes()
    {
        return $this->ticketTypes;
    }

    protected function incrementTicketsWantedCounter($howManyNewTickets)
    {
        $this->ticketsWantedCounter += $howManyNewTickets;
    }

    public function addNewWantedTickets(WantedTicket $wantedTicket)
    {
        $this->wantedTickets[] = $wantedTicket;

        $this->incrementTicketsWantedCounter($wantedTicket->getTicketsNeeded());

        $wantedTicket->getTicketType()->incrementTicketsWantedCounter($wantedTicket->getTicketsNeeded());
    }

    public function getWantedTickets()
    {
        return $this->wantedTickets;
    }
}
