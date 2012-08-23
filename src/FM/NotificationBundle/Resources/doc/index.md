FMNotificationBundle
====================

A simple symfony bundle to simplify notification

Usage example:
--------------

```php
        $notificationManager = $this->container->get('fm_notification.manager');
        $notificationManager->notify($notificationManager->create(
                                                $this->getUser()->getUsername(),
                                                $this->getUser(),
                                                'subject: test', 'message: essai'));
```
