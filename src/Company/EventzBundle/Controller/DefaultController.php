<?php
namespace Company\EventzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CompanyEventzBundle:Default:index.html.twig');
    }
}
