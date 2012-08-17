<?php
/**
 * @author francois
 *
 */

namespace FM\CalendarBundle\Form\Handler;

use FM\CalendarBundle\Entity\Event;

class DeleteEventFormHandler extends AbstractEventFormHandler
{
    public function onSuccess(Event $event)
    {
        $this->em->remove($entity);
        $this->em->flush();
    }
}
