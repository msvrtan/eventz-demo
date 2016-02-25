<?php
namespace Company\EventzBundle\Entity;

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
    private $ticketsSoldCounter;

    /**
     * @var int
     */
    private $ticketsAvailableCounter;

    /**
     * @var int
     */
    private $ticketsWantedCounter;

    /**
     * @var bool
     */
    private $active;

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
}
