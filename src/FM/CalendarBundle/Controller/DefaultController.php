<?php

namespace FM\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FMCalendarBundle:Default:index.html.twig', array('name' => $name));
    }
}
