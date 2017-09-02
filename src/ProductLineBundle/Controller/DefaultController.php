<?php

namespace ProductLineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('ProductLineBundle:Default:index.html.twig');
    }
    /**
     * @Route("/product", name="product")
     */
    public function productFormAction()
    {
        die('asd');
//        return $this->render('ProductLineBundle:Default:index.html.twig');
    }
    
    
    
    
}
