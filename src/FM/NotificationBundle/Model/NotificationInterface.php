<?php

namespace FM\NotificationBundle\Model;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\EventDispatcher\Event;

interface NotificationInterface
{
    /**
     * Return the target of the notification
     * 
     * @return Symfony\Component\Security\Core\User\UserInterface 
     */
    function getTarget();
    
    /**
     * Return the Class who triggered the Notification
     * 
     * @return string
     */
    function getActor();
    
    /**
     * Return when the notification was sent
     * 
     * @return \DateTime
     */
    function getSentAt();
    
    /**
     * Return when the Notification was created
     * 
     * @return \DateTime
     */
    function getCreatedAt();
    
    /**
     * Indicates whether the notification was read
     * 
     * @return boolean
     */
    function isRead();
    
    /**
     * Return when the Notification was read
     * 
     * @return \DateTime
     */
    function getReadAt();
    
    /**
     * Marks the notification as read
     * 
     * @return void
     */
    function markRead();
    
    /**
     * Marks the notification as unread
     * 
     * @return void
     */
    function markUnred();
    
    /**
     * Return the subject of the notification
     * 
     * @return string
     */
    function getSubject();
    
    /**
     * Defines the subject of the notification
     * 
     * @param string $subject
     * @return void
     */
    function setSubject($subject);

    /**
     * Return the message of the notification
     * 
     * @return string
     */
    function getMessage();
    
    /**
     * Defines the message of the notification
     * 
     * @param string $message
     * @return void
     */
    function setMessage($message);
    
}