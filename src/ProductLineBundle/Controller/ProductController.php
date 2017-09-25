<?php

namespace ProductLineBundle\Controller;

use ProductLineBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Product controller.
 *
 * @Route("product")
 */
class ProductController extends Controller
{
    /**
     * Lists all product entities.
     *
     * @Route("/", name="product_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository('ProductLineBundle:Product')->findAll();

        foreach($products as $item){
            $item->setTmp(unserialize($item->getSpecification()));
        }
        
        return $this->render('product/index.html.twig', array(
            'products' => $products,
        ));
    }

    /**
     * Creates a new product entity.
     *
     * @Route("/new", name="product_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $product = new Product();
        $form = $this->createForm('ProductLineBundle\Form\ProductType', $product);
        $form->handleRequest($request);
        
        $products = $this->getDoctrine()->getManager()->getRepository('ProductLineBundle:Product')->findAll();
        


        if ($form->isSubmitted() && $form->isValid()) {
            
            $ingredients = $request->request->get('ingredient');
            $quantity = $request->request->get('quantity'); 
            $name = $request->request->get('productlinebundle_product'); 
            $result = [];
 
            $findProduct  = $this->getDoctrine()->getManager()->getRepository('ProductLineBundle:Product')->findByName($name['name']);
            
            if ($findProduct != null){
                        return $this->render('product/new.html.twig', array(
            'product' => $product,
            'products' => $products,
            'form' => $form->createView(),
            ));
            }
     
            
            for ($i = 0; $i<count($ingredients); $i++){
                $result[$ingredients[$i]] = $quantity[$i];
            }
            
            $result = serialize($result);
            
            $product->setSpecification($result);
            
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            
            
            return $this->redirectToRoute('product_show', array('id' => $product->getId()));
            
        }
        
        

        return $this->render('product/new.html.twig', array(
            'product' => $product,
            'products' => $products,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a product entity.
     *
     * @Route("/{id}", name="product_show")
     * @Method("GET")
     */
    public function showAction(Product $product)
    {
        $deleteForm = $this->createDeleteForm($product);
        
        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository('ProductLineBundle:Product')->findAll();
        
         foreach($products as $item){
         $item->setTmp(unserialize($item->getSpecification()));
        }

        return $this->render('product/show.html.twig', array(
            'product' => $product,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing product entity.
     *
     * @Route("/{id}/edit", name="product_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Product $product)
    {
        $deleteForm = $this->createDeleteForm($product);
        $editForm = $this->createForm('ProductLineBundle\Form\ProductType', $product);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('product_edit', array('id' => $product->getId()));
        }

        return $this->render('product/edit.html.twig', array(
            'product' => $product,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a product entity.
     *
     * @Route("/{id}", name="product_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Product $product)
    {
        $form = $this->createDeleteForm($product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($product);
            $em->flush();
        }

        return $this->redirectToRoute('product_index');
    }

    /**
     * Creates a form to delete a product entity.
     *
     * @param Product $product The product entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Product $product)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('product_delete', array('id' => $product->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
