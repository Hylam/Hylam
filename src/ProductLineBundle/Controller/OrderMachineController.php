<?php

namespace ProductLineBundle\Controller;

use ProductLineBundle\Entity\OrderMachine;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ordermachine controller.
 *
 * @Route("ordermachine")
 */
class OrderMachineController extends Controller
{
    /**
     * Lists all orderMachine entities.
     *
     * @Route("/", name="ordermachine_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $orderMachines = $em->getRepository('ProductLineBundle:OrderMachine')->findAll();

        return $this->render('ordermachine/index.html.twig', array(
            'orderMachines' => $orderMachines,
        ));
    }

    /**
     * Creates a new orderMachine entity.
     *
     * @Route("/new", name="ordermachine_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $orderMachine = new Ordermachine();
        $form = $this->createForm('ProductLineBundle\Form\OrderMachineType', $orderMachine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($orderMachine);
            $em->flush();

            return $this->redirectToRoute('ordermachine_show', array('id' => $orderMachine->getId()));
        }

        return $this->render('ordermachine/new.html.twig', array(
            'orderMachine' => $orderMachine,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a orderMachine entity.
     *
     * @Route("/{id}", name="ordermachine_show")
     * @Method("GET")
     */
    public function showAction(OrderMachine $orderMachine)
    {
        $deleteForm = $this->createDeleteForm($orderMachine);

        return $this->render('ordermachine/show.html.twig', array(
            'orderMachine' => $orderMachine,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing orderMachine entity.
     *
     * @Route("/{id}/edit", name="ordermachine_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, OrderMachine $orderMachine)
    {
        $deleteForm = $this->createDeleteForm($orderMachine);
        $editForm = $this->createForm('ProductLineBundle\Form\OrderMachineType', $orderMachine);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ordermachine_edit', array('id' => $orderMachine->getId()));
        }

        return $this->render('ordermachine/edit.html.twig', array(
            'orderMachine' => $orderMachine,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a orderMachine entity.
     *
     * @Route("/{id}", name="ordermachine_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, OrderMachine $orderMachine)
    {
        $form = $this->createDeleteForm($orderMachine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($orderMachine);
            $em->flush();
        }

        return $this->redirectToRoute('ordermachine_index');
    }

    /**
     * Creates a form to delete a orderMachine entity.
     *
     * @param OrderMachine $orderMachine The orderMachine entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(OrderMachine $orderMachine)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ordermachine_delete', array('id' => $orderMachine->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
