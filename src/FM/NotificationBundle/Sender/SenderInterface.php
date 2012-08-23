<?php
namespace FM\NotificationBundle\Sender;

/**
 * 
 * @author francois
 *
 */
use FM\NotificationBundle\Model\Notification;

interface SenderInterface
{
    /**
     *  Sent the Notification
     *  
     * @param Notification $notification
     * @return boolean wheter the notification was sent
     */
    function send(Notification $notification);
}
