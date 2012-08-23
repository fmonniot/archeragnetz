<?php

namespace FM\NotificationBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class FMNotificationExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $xmlloader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        $this->loadSender($config['sender'], $container, $xmlloader);
        $this->loadNotifications($config, $container, $xmlloader);
    }
    
    
    private function loadSender(array $config, ContainerBuilder $container, Loader\XmlFileLoader $loader)
    {
        $loader->load('sender.xml');
        
        $container->setAlias('fm_notification.sender.default', $config['default']);
        
        //TODO Create a function to automate the stuff below
        $container->setParameter('fm_notification.sender.email.class', $config['email']['class']);
        $container->setParameter('fm_notification.sender.email.template', $config['email']['template']);
        unset($config['default'],$config['email']['class'],$config['email']['template']);
    }
    
    private function loadNotifications(array $config, ContainerBuilder $container, Loader\XmlFileLoader $loader)
    {
        $loader->load('notifications.xml');
        
        //TODO Create a function to automate the stuff below
        $container->setParameter('fm_notification.manager.class', $config['manager']['class']);
        unset($config['manager']['class']);
    }
}
