<?php

namespace FM\ArcherAgnetzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FMArcherAgnetzBundle:Default:index.html.twig', array('name' => $name));
    }

    public function homeAction()
    {
        return $this->render('FMArcherAgnetzBundle:Default:index.html.twig', array('name' => 'Accueil'));
    }

    public function clubLifeAction()
    {
        return $this->render('FMArcherAgnetzBundle:Default:index.html.twig', array('name' => 'Vie du club'));
    }

    public function photosAction()
    {
        return $this->render('FMArcherAgnetzBundle:Default:index.html.twig', array('name' => 'Galerie Photo'));
    }

    public function joinUsAction()
    {
        return $this->render('FMArcherAgnetzBundle:Default:index.html.twig', array('name' => 'Nous rejoindre'));
    }

    public function contactAction()
    {
        return $this->render('FMArcherAgnetzBundle:Default:index.html.twig', array('name' => 'Nous contacter'));
    }
}