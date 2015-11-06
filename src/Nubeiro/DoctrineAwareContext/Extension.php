<?php
/**
 * Extension
 */

namespace Nubeiro\DoctrineAwareContext;

use Behat\Testwork\ServiceContainer\Extension as ExtensionInterface;
use Behat\Testwork\ServiceContainer\ExtensionManager;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class Extension implements ExtensionInterface
{
    const NUBEIRO_DAC_ID = 'nubeiro_dac';

    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        // TODO: Implement process() method.
    }

    /**
     * Returns the extension config key.
     *
     * @return string
     */
    public function getConfigKey()
    {
        return self::NUBEIRO_DAC_ID;
    }

    /**
     * Initializes other extensions.
     *
     * This method is called immediately after all extensions are activated but
     * before any extension `configure()` method is called. This allows extensions
     * to hook into the configuration of other extensions providing such an
     * extension point.
     *
     * @param ExtensionManager $extensionManager
     */
    public function initialize(ExtensionManager $extensionManager)
    {
        // TODO: Implement initialize() method.
    }

    /**
     * Setups configuration for the extension.
     *
     * @param ArrayNodeDefinition $builder
     */
    public function configure(ArrayNodeDefinition $builder)
    {
        $builder
            ->children()
            ->arrayNode('databases')
                ->isRequired()
                    ->prototype('array')
                        ->children()
                            ->scalarNode('driver')->isRequired()->end()
                            ->scalarNode('host')->isRequired()->end()
                            ->scalarNode('dbname')->isRequired()->end()
                            ->scalarNode('user')->isRequired()->end()
                            ->scalarNode('password')->isRequired()->end()
                            ->scalarNode('entity_manager')->isRequired()->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

    /**
     * Loads extension services into temporary container.
     *
     * @param ContainerBuilder $container
     * @param array $config
     */
    public function load(ContainerBuilder $container, array $config)
    {
        // TODO: Implement load() method.
    }
}