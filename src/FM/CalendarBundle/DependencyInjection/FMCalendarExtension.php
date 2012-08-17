<?php

namespace FM\CalendarBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader as Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class FMCalendarExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $ymlloader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config/services'));
        $xmlloader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config/services'));

        $this->loadEvent($config['event'], $container, $xmlloader);
        $this->loadGlobal($config, $container, $ymlloader);
    }

    private function loadGlobal(array $config, ContainerBuilder $container, Loader\YamlFileLoader $loader)
    {
        $loader->load('global.yml');
    }

    private function loadEvent(array $config, ContainerBuilder $container, Loader\XmlFileLoader $loader)
    {
        $loader->load('events.xml');

        $container->setAlias('fm_calendar.event.form.persist.handler', $config['form']['persist']['handler']);
        unset($config['form']['persist']['handler']);

        $container->setAlias('fm_calendar.event.form.delete.handler', $config['form']['delete']['handler']);
        unset($config['form']['delete']['handler']);

        //TODO Create a function to automate the stuff below
        $container->setParameter('fm_calendar.event.form.persist.name', $config['form']['persist']['name']);
        $container->setParameter('fm_calendar.event.form.persist.type', $config['form']['persist']['type']);
        $container->setParameter('fm_calendar.event.form.delete.name', $config['form']['delete']['name']);
        $container->setParameter('fm_calendar.event.form.delete.type', $config['form']['delete']['type']);
    }
}
