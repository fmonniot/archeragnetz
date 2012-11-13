<?php

namespace FM\ArcherAgnetzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function homeAction()
    {
        return $this->render('FMArcherAgnetzBundle:Default:home.html.twig');
    }

    public function clubLifeAction()
    {
        return $this->render('FMArcherAgnetzBundle:Default:life-club.html.twig');
    }

    public function photosAction()
    {
        return $this->render('FMArcherAgnetzBundle:Default:photos.html.twig');
    }

    public function joinUsAction()
    {
        return $this->render('FMArcherAgnetzBundle:Default:join-us.html.twig');
    }

    public function contactAction()
    {
        return $this->render('FMArcherAgnetzBundle:Default:contact.html.twig');
    }
}