<?php

namespace ProductLineBundle\Controller;

use ProductLineBundle\Entity\Warehouse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Warehouse controller.
 *
 * @Route("warehouse")
 */
class WarehouseController extends Controller
{
    /**
     * Lists all warehouse entities.
     *
     * @Route("/", name="warehouse_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $warehouses = $em->getRepository('ProductLineBundle:Warehouse')->findAll();

        return $this->render('warehouse/index.html.twig', array(
            'warehouses' => $warehouses,
        ));
    }

    /**
     * Creates a new warehouse entity.
     *
     * @Route("/new", name="warehouse_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $warehouse = new Warehouse();
        $form = $this->createForm('ProductLineBundle\Form\WarehouseType', $warehouse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           
            $productId = $request->request->get('productlinebundle_warehouse')['material'];
            
            $repo= $this->getDoctrine()->getManager()->getRepository('ProductLineBundle:Product');
            
            $findProduct = $repo->find($productId);
            
            $uom = $findProduct->getUoM();
            $warehouse->setUoM($uom);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($warehouse);
            $em->flush();

            return $this->redirectToRoute('warehouse_show', array('id' => $warehouse->getId()));
        }

        return $this->render('warehouse/new.html.twig', array(
            'warehouse' => $warehouse,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a warehouse entity.
     *
     * @Route("/{id}", name="warehouse_show")
     * @Method("GET")
     */
    public function showAction(Warehouse $warehouse)
    {
        $deleteForm = $this->createDeleteForm($warehouse);

        return $this->render('warehouse/show.html.twig', array(
            'warehouse' => $warehouse,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing warehouse entity.
     *
     * @Route("/{id}/edit", name="warehouse_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Warehouse $warehouse)
    {
        $deleteForm = $this->createDeleteForm($warehouse);
        $editForm = $this->createForm('ProductLineBundle\Form\WarehouseType', $warehouse);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('warehouse_edit', array('id' => $warehouse->getId()));
        }

        return $this->render('warehouse/edit.html.twig', array(
            'warehouse' => $warehouse,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a warehouse entity.
     *
     * @Route("/{id}", name="warehouse_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Warehouse $warehouse)
    {
        $form = $this->createDeleteForm($warehouse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($warehouse);
            $em->flush();
        }

        return $this->redirectToRoute('warehouse_index');
    }

    /**
     * Creates a form to delete a warehouse entity.
     *
     * @param Warehouse $warehouse The warehouse entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Warehouse $warehouse)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('warehouse_delete', array('id' => $warehouse->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
