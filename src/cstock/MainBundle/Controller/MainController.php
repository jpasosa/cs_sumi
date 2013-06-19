<?php

namespace cstock\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MainController extends Controller
{
    /**
     * @Route("/homepage", name="_homepage")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('cstockMainBundle:Main:homepage.html.twig');
    }

   
}
