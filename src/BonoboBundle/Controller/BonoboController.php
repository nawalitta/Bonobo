<?php

namespace BonoboBundle\Controller;

use BonoboBundle\Entity\Bonobo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Bonobo controller.
 *
 * @Route("bonobo")
 */
class BonoboController extends Controller
{
    /**
     * Lists all bonobo entities.
     *
     * @Route("/", name="bonobo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bonobos = $em->getRepository('BonoboBundle:Bonobo')->findAll();

        return $this->render('bonobo/index.html.twig', array(
            'bonobos' => $bonobos,
        ));
    }

    /**
     * Creates a new bonobo entity.
     *
     * @Route("/new", name="bonobo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bonobo = new Bonobo();
        $form = $this->createForm('BonoboBundle\Form\BonoboType', $bonobo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bonobo);
            $em->flush($bonobo);

            return $this->redirectToRoute('bonobo_show', array('id' => $bonobo->getId()));
        }

        return $this->render('bonobo/new.html.twig', array(
            'bonobo' => $bonobo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bonobo entity.
     *
     * @Route("/{id}", name="bonobo_show")
     * @Method("GET")
     */
    public function showAction(Bonobo $bonobo)
    {
        $deleteForm = $this->createDeleteForm($bonobo);

        return $this->render('bonobo/show.html.twig', array(
            'bonobo' => $bonobo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bonobo entity.
     *
     * @Route("/{id}/edit", name="bonobo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Bonobo $bonobo)
    {
        $deleteForm = $this->createDeleteForm($bonobo);
        $editForm = $this->createForm('BonoboBundle\Form\BonoboType', $bonobo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bonobo_edit', array('id' => $bonobo->getId()));
        }

        return $this->render('bonobo/edit.html.twig', array(
            'bonobo' => $bonobo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bonobo entity.
     *
     * @Route("/{id}", name="bonobo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Bonobo $bonobo)
    {
        $form = $this->createDeleteForm($bonobo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bonobo);
            $em->flush($bonobo);
        }

        return $this->redirectToRoute('bonobo_index');
    }

    /**
     * Creates a form to delete a bonobo entity.
     *
     * @param Bonobo $bonobo The bonobo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bonobo $bonobo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bonobo_delete', array('id' => $bonobo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
