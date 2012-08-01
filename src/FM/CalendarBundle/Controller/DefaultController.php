<?php

namespace FM\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $query = $this->getDoctrine()->getRepository('FMCalendarBundle:Calendar')->createQueryBuilder('c')
            ->where('c.name = :name')
            ->setParameter('name','Publique')
            ->getQuery();
        $events = $query->getSingleResult()->getEvents();
        return $this->render('FMCalendarBundle:Default:index.html.twig', array('events'=>$events));
    }
}
