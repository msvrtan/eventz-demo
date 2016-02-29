<?php
namespace Company\EventzBundle\Controller;

use Company\EventzBundle\Entity\Event;
use Company\EventzBundle\Entity\WantedTicket;
use Company\EventzBundle\Form\WantedTicketType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * WantedTicket controller.
 */
class WantedTicketController extends Controller
{
    /**
     * Creates a new WantedTicket entity.
     */
    public function newAction(Request $request)
    {
        $wantedTicket = new WantedTicket();

        //Set event.
        $event = $this->getEventRepo()->findOneById($request->get('eventId'));
        $wantedTicket->setEvent($event);

        //Pre set ticket type if any suggested
        if (!empty($request->get('ticketTypeId'))) {
            $ticketType = $this->getTicketTypeRepo()->findOneById($request->get('ticketTypeId'));
            $wantedTicket->setTicketType($ticketType);
        }

        $form = $this->createCreateForm($wantedTicket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $event->addNewWantedTickets($wantedTicket);

            $em->persist($wantedTicket);
            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute('company_event_wantedticket_show', ['id' => $wantedTicket->getId()]);
        }

        return $this->render(
            'wantedticket/new.html.twig',
            [
                'wantedTicket' => $wantedTicket,
                'form'         => $form->createView(),
                'event'        => $wantedTicket->getEvent(),
            ]
        );
    }

    /**
     * Creates a form to create a BlogPost entity.
     *
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(WantedTicket $entity)
    {
        $form = $this->createForm(
            new WantedTicketType(),
            $entity,
            [
                'action' => $this->generateUrl(
                    'company_event_wantedticket_new',
                    ['eventId' => $entity->getEvent()->getId()]
                ),
                'method' => 'POST',
            ]
        );

        return $form;
    }

    /**
     * Finds and displays a WantedTicket entity.
     */
    public function showAction(WantedTicket $wantedTicket)
    {
        return $this->render(
            'wantedticket/show.html.twig',
            [
                'wantedTicket' => $wantedTicket,
            ]
        );
    }

    private function getEventRepo()
    {
        return $this->getDoctrine()->getRepository('CompanyEventzBundle:Event');
    }

    private function getTicketTypeRepo()
    {
        return $this->getDoctrine()->getRepository('CompanyEventzBundle:TicketType');
    }
}
