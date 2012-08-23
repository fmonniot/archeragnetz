<?php
namespace FM\NotificationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('fm_notification');

        $this->addSenderSection($rootNode);
        $this->addNotificationsSection($rootNode);

        return $treeBuilder;
    }
    
    private function addSenderSection(ArrayNodeDefinition $node)
    {
        $node
        ->children()
            ->arrayNode('sender')
                ->addDefaultsIfNotSet()
                ->canBeUnset()
                ->children()
                    ->scalarNode('default')
                        ->defaultValue('fm_notification.sender.email')
                        ->cannotBeEmpty()
                    ->end()
                    ->arrayNode('email')
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('class')->defaultValue('FM\NotificationBundle\Sender\EmailSender')->end()
                            ->scalarNode('template')->defaultValue('FMNotificationBundle:email:default.txt.twig')->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ->end();
    }
    
    private function addNotificationsSection(ArrayNodeDefinition $node)
    {
        $node->children()
            ->arrayNode('manager')
                ->addDefaultsIfNotSet()
                ->canBeUnset()
                ->children()
                    ->scalarNode('class')->defaultValue('FM\NotificationBundle\Model\NotificationManager')->end()
                ->end()
            ->end()
        ->end();
    }
}
