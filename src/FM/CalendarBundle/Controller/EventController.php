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
     * Create a new Event entity.
     *
     */
    public function newAction()
    {
        $entity  = new Event();
        
        $form = $this->container->get('fm_calendar.event.form');
        $formHandler = $this->container->get('fm_calendar.event.form.handler.persist');
        
        $process = $formHandler->process($entity);
        
        if($process)
            return $this->redirect($this->generateUrl('fm_calendar_homepage'));
        
        return $this->render('FMCalendarBundle:Event:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Edits an existing Event entity.
     *
     */
    public function editAction(Event $event)
    {

        if (!$event) {
            throw $this->createNotFoundException('Unable to find Event entity.');
        }
        
        $form = $this->container->get('fm_calendar.event.form');
        $formHandler = $this->container->get('fm_calendar.event.form.handler.persist');
        $deleteForm = $this->createDeleteForm($event);

        $process = $formHandler->process($event);

        if ($process) {
            return $this->redirect($this->generateUrl('fm_calendar_homepage'));
        }
       
        return $this->render('FMCalendarBundle:Event:edit.html.twig', array(
            'form'   => $form->createView(),
            'entity'      => $event,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Event entity.
     *
     */
    public function deleteAction(Event $event)
    {
        $form = $this->createDeleteForm($event);
        $formHandler = $this->container->get('fm_calendar.event.form.handler.delete');

        $formHandler->process($event);

        return $this->redirect($this->generateUrl('fm_calendar_homepage'));
    }

    private function createDeleteForm(Event $event)
    {
        $form = $this->container->get('fm_calendar.event.form.delete');
        $form->setData($event);
        return $form;
    }
}
