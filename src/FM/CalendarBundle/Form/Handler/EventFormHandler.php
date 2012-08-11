<?php
/**
 * @author francois
 *
 */

namespace FM\CalendarBundle\Form\Handler;


use Doctrine\ORM\EntityManager;

use FM\CalendarBundle\Entity\Event;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\FormInterface;

class EventFormHandler
{
    protected $form;
    protected $request;
    
    public function __construct(FormInterface $form, Request $request, EntityManager $em)
    {
        $this->form = $form;
        $this->request = $request;
        $this->em = $em;
    }
    
    public function process(Event $event)
    {
        //$form    = $this->createForm(new EventType(), $entity);
        $this->form->bindRequest($this->request);
        
        if ($this->form->isValid()) {
            $this->onSuccess($event);
            return true;
        }else {
            $this->onFailure();
            return false;
        }
    }
    
    public function onSuccess(Event $event)
    {
        $this->em->persist($event);
        $this->em->flush();
    }
    
    public function onFailure()
    {
        
    }
}