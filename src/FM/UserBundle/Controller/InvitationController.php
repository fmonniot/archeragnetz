<?php

namespace FM\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Doctrine\ORM\EntityManager;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

class InvitationController extends Controller
{
    protected $em;
    protected $request;
    protected $templating;
    protected $router;
    
    public function __construct(EntityManager $em,
                                Request $request,
                                EngineInterface $templating,
                                RouterInterface $router)
    {
        $this->em = $em;
        $this->request = $request;
        $this->templating = $templating;
        $this->router = $router;
    }
    
    public function indexAction()
    {
        return $this->templating->renderResponse(
            'FMUserBundle:Invitation:index.html.twig',
            array('param'=>'some parameters')
        );
    }
    
    public function sendAction()
    {
        return $this->templating->renderResponse(
            'FMUserBundle:Invitation:index.html.twig',
            array('param'=>'some parameters')
        );
    }
    
    public function showAction($id)
    {
        return $this->templating->renderResponse(
            'FMUserBundle:Invitation:index.html.twig',
            array('param'=>'some parameters')
        );
    }
    
    public function deleteAction($id)
    {
        return $this->templating->renderResponse(
            'FMUserBundle:Invitation:index.html.twig',
            array('param'=>'some parameters')
        );
    }
}
