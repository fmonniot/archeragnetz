<?php

namespace FM\CalendarBundle\Controller;

use Symfony\Component\DomCrawler\Form;

use Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher;

use FM\Calendar\Form\Handler\EventFormHandler;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\User\UserInterface;

use FM\CalendarBundle\Entity\Event;
use FM\CalendarBundle\Form\Type\EventType;
use FM\CalendarBundle\Entity\User;

/**
 * Event controller.
 *
 */
class EventController extends Controller
{
    /**
     * Lists all Event entities.
     *
     */
    public function indexAction()
    {
        if( $this->get('security.context')->isGranted('ROLE_USER') )
        {
            $events = $this->getDoctrine()->getRepository('FMCalendarBundle:Event')->findAll();
        }
        else 
        {
            $events = $this->getDoctrine()->getRepository('FMCalendarBundle:Event')->findAllPublic();
        }
        return $this->render('FMCalendarBundle:Default:index.html.twig', array('events'=>$events));
    }
    
    /**
     * List Event entities by author (created_by)
     *
     */
    public function listByUserAction(User $user)
    {
        $events = $this->getDoctrine()->getRepository('FMCalendarBundle:Event')->findAllByAuthor($user);
        
        return $this->render('FMCalendarBundle:Default:list.html.twig', array(
            'events'=>$events,
            'user'=>$user
        ));
    }

    /**
     * Displays a form to create a new Event entity.
     *
     */
    public function newAction()
    {
        $entity = new Event();
        $form   = $this->createForm(new EventType(), $entity);

        return $this->render('FMCalendarBundle:Event:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Event entity.
     *
     */
    public function createAction()
    {
        $entity  = new Event();
        $request = $this->getRequest();
        
        $form = $this->container->get('fm_calendar.event.form');
        $formHandler = $this->container->get('fm_calendar.event.form.handler.default');
        
        $process = $formHandler->process($entity);
        
        if($process)
            return $this->redirect($this->generateUrl('fm_calendar_homepage', array('id' => $entity->getId())));
        /*
        $form    = $this->createForm(new EventType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fm_calendar_homepage', array('id' => $entity->getId())));
        }
        //*/

        return $this->render('FMCalendarBundle:Event:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Event entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FMCalendarBundle:Event')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Event entity.');
        }

        $editForm = $this->createForm(new EventType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FMCalendarBundle:Event:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Event entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FMCalendarBundle:Event')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Event entity.');
        }

        $editForm   = $this->createForm(new EventType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fm_calendar_event_edit', array('id' => $id)));
        }

        return $this->render('FMCalendarBundle:Event:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Event entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FMCalendarBundle:Event')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Event entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('fm_calendar_homepage'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
