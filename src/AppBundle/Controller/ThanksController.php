<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Thanks;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Thank controller.
 *
 * @Route("thanks")
 */
class ThanksController extends Controller
{
    /**
     * Lists all thank entities.
     *
     * @Route("/", name="thanks_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $thanks = $em->getRepository('AppBundle:Thanks')->findAll();

        return $this->render('thanks/index.html.twig', array(
            'thanks' => $thanks,
        ));
    }

    /**
     * Creates a new thank entity.
     *
     * @Route("/new", name="thanks_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $thank = new Thanks();
        $form = $this->createForm('AppBundle\Form\ThanksType', $thank);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($thank);
            $em->flush();

            return $this->redirectToRoute('thanks_show', array('id' => $thank->getId()));
        }

        return $this->render('thanks/new.html.twig', array(
            'thank' => $thank,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a thank entity.
     *
     * @Route("/{id}", name="thanks_show")
     * @Method("GET")
     */
    public function showAction(Thanks $thank)
    {
        $deleteForm = $this->createDeleteForm($thank);

        return $this->render('thanks/show.html.twig', array(
            'thank' => $thank,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing thank entity.
     *
     * @Route("/{id}/edit", name="thanks_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Thanks $thank)
    {
        $deleteForm = $this->createDeleteForm($thank);
        $editForm = $this->createForm('AppBundle\Form\ThanksType', $thank);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('thanks_edit', array('id' => $thank->getId()));
        }

        return $this->render('thanks/edit.html.twig', array(
            'thank' => $thank,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a thank entity.
     *
     * @Route("/{id}", name="thanks_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Thanks $thank)
    {
        $form = $this->createDeleteForm($thank);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($thank);
            $em->flush();
        }

        return $this->redirectToRoute('thanks_index');
    }

    /**
     * Creates a form to delete a thank entity.
     *
     * @param Thanks $thank The thank entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Thanks $thank)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('thanks_delete', array('id' => $thank->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
