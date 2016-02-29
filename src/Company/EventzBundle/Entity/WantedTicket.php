<?php
namespace Company\EventzBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * WantedTicket.
 */
class WantedTicket
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Event
     */
    private $event;

    /**
     * @var TicketType
     */
    private $ticketType;

    /**
     * @var int
     */
    private $ticketsNeeded;

    /**
     * @var int
     */
    private $maximumPricePerTicket;

    /**
     * @var string
     */
    private $maximumPricePerTicketCurrency = 'EUR';

    /**
     * @var string
     * @Assert\Email()
     */
    private $notificationEmail;

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
     * Set event.
     *
     * @param int $event
     *
     * @return WantedTicket
     */
    public function setEvent($event)
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

    /**
     * Set ticketType.
     *
     * @param int $ticketType
     *
     * @return WantedTicket
     */
    public function setTicketType($ticketType)
    {
        $this->ticketType = $ticketType;

        return $this;
    }

    /**
     * Get ticketType.
     *
     * @return int
     */
    public function getTicketType()
    {
        return $this->ticketType;
    }

    /**
     * Set ticketsNeeded.
     *
     * @param int $ticketsNeeded
     *
     * @return WantedTicket
     */
    public function setTicketsNeeded($ticketsNeeded)
    {
        $this->ticketsNeeded = $ticketsNeeded;

        return $this;
    }

    /**
     * Get ticketsNeeded.
     *
     * @return int
     */
    public function getTicketsNeeded()
    {
        return $this->ticketsNeeded;
    }

    /**
     * Set maximumPricePerTicket.
     *
     * @param int $maximumPricePerTicket
     *
     * @return WantedTicket
     */
    public function setMaximumPricePerTicket($maximumPricePerTicket)
    {
        $this->maximumPricePerTicket = $maximumPricePerTicket;

        return $this;
    }

    /**
     * Get maximumPricePerTicket.
     *
     * @return int
     */
    public function getMaximumPricePerTicket()
    {
        return $this->maximumPricePerTicket;
    }

    /**
     * Set maximumPricePerTicketCurrency.
     *
     * @param string $maximumPricePerTicketCurrency
     *
     * @return WantedTicket
     */
    public function setMaximumPricePerTicketCurrency($maximumPricePerTicketCurrency)
    {
        $this->maximumPricePerTicketCurrency = $maximumPricePerTicketCurrency;

        return $this;
    }

    /**
     * Get maximumPricePerTicketCurrency.
     *
     * @return string
     */
    public function getMaximumPricePerTicketCurrency()
    {
        return $this->maximumPricePerTicketCurrency;
    }

    /**
     * Set notificationEmail.
     *
     * @param string $notificationEmail
     *
     * @return WantedTicket
     */
    public function setNotificationEmail($notificationEmail)
    {
        $this->notificationEmail = $notificationEmail;

        return $this;
    }

    /**
     * Get notificationEmail.
     *
     * @return string
     */
    public function getNotificationEmail()
    {
        return $this->notificationEmail;
    }
}
