<?php

namespace FM\CalendarBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('fm_calendar');

        $this->addEventSection($rootNode);

        return $treeBuilder;
    }

    private function addEventSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('event')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('form')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->arrayNode('persist')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('type')->defaultValue('fm_calendar_event_form_type')->end()
                                        ->scalarNode('handler')->defaultValue('fm_calendar.event.form.persist.handler.default')->end()
                                        ->scalarNode('name')->defaultValue('fm_calendar_event_form_persist')->end()
                                    ->end()
                                ->end()
                                ->arrayNode('delete')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('type')->defaultValue('fm_calendar_event_form_delete_type')->end()
                                        ->scalarNode('handler')->defaultValue('fm_calendar.event.form.delete.handler.default')->end()
                                        ->scalarNode('name')->defaultValue('fm_calendar_event_form_delete')->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }
}
