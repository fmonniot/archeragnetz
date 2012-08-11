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

class PersistEventFormHandler extends AbstractEventFormHandler
{
    public function onSuccess(Event $event)
    {
        $this->em->persist($event);
        $this->em->flush();
    }
}