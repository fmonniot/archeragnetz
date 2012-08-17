<?php

namespace FM\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function myEventsAction()
    {

        if ( $this->get('security.context')->isGranted('ROLE_USER') ) {

            $events = $this->getDoctrine()->getRepository('FMCalendarBundle:Event')->findAllByAuthor($this->getUser());

            return $this->render('FMCalendarBundle:Default:list.html.twig', array(
                'events'=>$events,
                'user'=>$this->getUser(),
                'list_title'=>"Mes Évènements"
            ));
        } else {
            return $this->redirect($this->generateUrl('fm_calendar_homepage'));
        }

    }
}
