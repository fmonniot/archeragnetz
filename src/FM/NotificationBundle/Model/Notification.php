<?php
namespace FM\NotificationBundle\Model;
use FOS\UserBundle\Model\UserInterface;
use FM\NotificationBundle\Model\NotificationInterface;
use \DateTime;

/**
 * @author francois
 *
 */
abstract class Notification implements NotificationInterface
{
    /**
     * @var string
     */
    protected $actor;

    /**
     * @var UserInterface
     */
    protected $target;

    /**
     * @var \DateTime
     */
    protected $sentAt;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $readAt;

    /**
     * @var string
     */
    protected $subject;

    /**
     * @var string
     */
    protected $message;

    /**
     * @return boolean
     */

    public function __construct()
    {
        $this->createdAt = new DateTime();
    }
    
    /**
     * (non-PHPdoc)
     * @see FM\NotificationBundle\Model.NotificationInterface::getActor()
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * @param string $actor
     */
    public function setActor($actor)
    {
        $this->actor = $actor;
    }

    /**
     * (non-PHPdoc)
     * @see FM\NotificationBundle\Model.NotificationInterface::getTarget()
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param UserInterface $target
     */
    public function setTarget(UserInterface $target)
    {
        $this->target = $target;
    }


    /**
     * (non-PHPdoc)
     * @see FM\NotificationBundle\Model.NotificationInterface::getSentAt()
     */
    public function getSentAt()
    {
        return $this->sentAt;
    }

    /**
     * (non-PHPdoc)
     * @see FM\NotificationBundle\Model.NotificationInterface::getCreatedAt()
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    /**
     * (non-PHPdoc)
     * @see FM\NotificationBundle\Model.NotificationInterface::isRead()
     */
    public function isRead()
    {
        return $this->getReadAt() !== NULL;
    }

    /**
     * (non-PHPdoc)
     * @see FM\NotificationBundle\Model.NotificationInterface::markRead()
     */
    public function markRead()
    {
        $this->readAt = new DateTime();
    }

    /**
     * (non-PHPdoc)
     * @see FM\NotificationBundle\Model.NotificationInterface::markUnred()
     */
    public function markUnread()
    {
        $this->readAt = null;

    }

    /**
     * (non-PHPdoc)
     * @see FM\NotificationBundle\Model.NotificationInterface::getReadAt()
     */
    public function getReadAt()
    {
        return $this->readAt;
    }

    /**
     * (non-PHPdoc)
     * @see FM\NotificationBundle\Model.NotificationInterface::getSubject()
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * (non-PHPdoc)
     * @see FM\NotificationBundle\Model.NotificationInterface::setSubject()
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * (non-PHPdoc)
     * @see FM\NotificationBundle\Model.NotificationInterface::getMessage()
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * (non-PHPdoc)
     * @see FM\NotificationBundle\Model.NotificationInterface::setMessage()
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

}
