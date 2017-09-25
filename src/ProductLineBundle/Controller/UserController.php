<?php

namespace ProductLineBundle\Controller;

use ProductLineBundle\Entity\User;
use FOS\UserBundle\Doctrine\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Product controller.
 *
 * @Route("admin")
 */

class UserController extends Controller {


    /**
     * Lists all users
     *
     * @Route("/", name="admin")
     * @Method("GET")
     */
    public function usersAction() {
        //access user manager services 

        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();

        return $this->render('ProductLineBundle:Admin:users.html.twig', array('users' =>   $users));
    }

}
