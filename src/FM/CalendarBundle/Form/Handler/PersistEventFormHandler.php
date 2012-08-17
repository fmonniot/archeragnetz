<?php
/**
 * @author francois
 *
 */

namespace FM\CalendarBundle\Form\Handler;

use FM\CalendarBundle\Entity\Event;

class PersistEventFormHandler extends AbstractEventFormHandler
{
    public function onSuccess(Event $event)
    {
        $this->em->persist($event);
        $this->em->flush();
    }
}
