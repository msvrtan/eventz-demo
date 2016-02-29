<?php
namespace Company\EventzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction($id)
    {
        $eventRepo = $this->getDoctrine()->getRepository('CompanyEventzBundle:Event');

        $event = $eventRepo->find($id);

        $data = ['event' => $event];

        return $this->render('CompanyEventzBundle:Default:index.html.twig', $data);
    }

    public function ticketTypeAction($id)
    {
        $ticketTypeRepo = $this->getDoctrine()->getRepository('CompanyEventzBundle:TicketType');

        $ticketType = $ticketTypeRepo->find($id);

        $data = ['ticketType' => $ticketType];

        return $this->render('CompanyEventzBundle:Default:ticketType.html.twig', $data);
    }
}
