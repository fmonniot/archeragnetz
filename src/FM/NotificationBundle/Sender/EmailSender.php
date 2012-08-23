<?php
namespace FM\NotificationBundle\Sender;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\Templating\EngineInterface;
use FOS\UserBundle\Model\UserInterface;
use FM\NotificationBundle\Model\Notification;
use FM\NotificationBundle\Sender\SenderInterface;

/**
 * @author francois
 *
 */
class EmailSender extends ContainerAware implements SenderInterface
{
    private $mailer;
    private $templating;
    private $templateName;

    public function __construct( \Swift_Mailer $mailer, EngineInterface $templating, $templateName)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
        $this->templateName = $templateName;
    }
    
    /**
     * Send the notification with the Swift_Mailer service
     * @param Notification $notification
     */
    public function send(Notification $notification)
    {
        
        $email = $notification->getTarget()->getEmail();
        $body = $this->templating->render( $this->templateName,
                                           array('message' => $notification->getMessage(),
                                                 'subject' => $notification->getSubject())
                                          );
        $mail = $this->mailer->createMessage('message');
        
        $mail = \Swift_Message::newInstance()
                    ->setFrom('no-reply@archeragnetz.fr')
                    ->setTo($email)
                    ->setSubject('Notification')
                    ->setBody($body);

        return $this->mailer->send($mail);
        
    }
}
