<?php
namespace FM\NotificationBundle\Model;

/**
 * @author francois
 *
 */
use FM\NotificationBundle\Sender\SenderInterface;

use FOS\UserBundle\Model\UserInterface;

use FM\NotificationBundle\Entity\Notification;

class NotificationManager
{
    /**
     * 
     * @param SenderInterface $sender the default sender
     */
    public function __construct(SenderInterface $sender)
    {
        $this->sender = $sender;
    }
    
    /**
     * 
     * @param string $actor
     * @param FOS\UserBundle\Model\UserInterface $target
     * @param string $subject
     * @param string $message
     * 
     * @return FM\NotificationBundle\Entity\Notification
     */
    public function create($actor, UserInterface $target, $subject, $message)
    {
        $notification = new Notification();
        
        $notification->setActor($actor);
        $notification->setTarget($target);
        $notification->setSubject($subject);
        $notification->setMessage($message);
        $notification->markUnread();
        
        return $notification;
    }
    
    /**
     * Pass the notification to the sender.
     * If no sender is pass to this method it will use the default sender
     * (defined in fm_calendar.sender.default )
     * 
     * @param Notification $notification
     * @param SenderInterface $sender
     */
    public function notify(Notification $notification, SenderInterface $sender = null)
    {
        empty($sender)?$sender=$this->sender:null;
        
        return $sender->send($notification);
    }
}
