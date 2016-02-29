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
}
