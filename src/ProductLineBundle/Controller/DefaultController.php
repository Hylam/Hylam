<?php

namespace ProductLineBundle\Controller;

use ProductLineBundle\Entity\OrderMachine;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="Index")
     */
    public function indexAction()
    {
        $date = new \DateTime;
        
        $em = $this->getDoctrine()->getEntityManager();
        $repo = $em->getRepository(OrderMachine::class);
        
        
        $orders = [
          'order1' =>$repo->getOrders(1),
          'order2' =>$repo->getOrders(2),
          'order3' =>$repo->getOrders(3),
        ];
        

        
        $status = [
          'status1' => "Pracuje",
          'status2' => "Pracuje",
          'status3' => "Pracuje",
        ];
        
        if ($orders['order1'] == null){
            $status['status1'] = "Wstrzymany";
        }
        
        if ($orders['order2'] == null){
            $status['status2'] = "Wstrzymany";
        }
        
        if ($orders['order3'] == null){
            $status['status3'] = "Wstrzymany";
        }
        
        

 
        return $this->render('ProductLineBundle:Default:index.html.twig', ['date' => $date, 'orders' => $orders, 'status' => $status]);
    }

    
    
}
