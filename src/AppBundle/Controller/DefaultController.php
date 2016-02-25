<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController.
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @SuppressWarnings("PHPMD.UnusedFormalParameter")
     */
    public function indexAction(Request $request)
    {
        $eventRepo = $this->getDoctrine()->getRepository('CompanyEventzBundle:Event');

        $allEvents = $eventRepo->findAll();

        $data = ['events' => $allEvents];

        return $this->render('default/index.html.twig', $data);
    }
}
