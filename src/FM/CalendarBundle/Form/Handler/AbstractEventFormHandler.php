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

abstract class AbstractEventFormHandler
{
    protected $form;
    protected $request;

    public function __construct(FormInterface $form, Request $request, EntityManager $em)
    {
        $this->form = $form;
        $this->request = $request;
        $this->em = $em;
    }

    /**
     * starts the process of the form
     *
     * @param  Event   $event
     * @return boolean
     */
    public function process(Event $event)
    {
        $this->form->setData($event);

        if ('POST' === $this->request->getMethod()) {
            $this->form->bindRequest($this->request);

            if ($this->form->isValid()) {
                $this->onSuccess($event);

                return true;
            } else {
                $this->onFailure($event);

                return false;
            }
        }
    }

    /**
     * Method which is fired if the form is valid
     *
     * @param Event $event
     */
    public function onSuccess(Event $event)
    {
    }

    /**
     * Method which is fired if the form isn't valid
     *
     * @param Event $event
     */
    public function onFailure(Event $event)
    {

    }
}
