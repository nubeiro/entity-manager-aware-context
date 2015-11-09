<?php
/**
 * Extension
 */

namespace Nubeiro\DoctrineAwareContext;

use Behat\Testwork\ServiceContainer\Extension as ExtensionInterface;
use Behat\Testwork\ServiceContainer\ExtensionManager;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;


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
        $this->addDbalSection($builder);
        $this->addOrmSection($builder);
    }

    private function addOrmSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
            ->arrayNode('orm')
                ->fixXmlConfig('entity_manager')
                ->append($this->getOrmEntityManagersNode())
            ->end()
        ;
    }

    private function getOrmEntityManagersNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('entity_managers');
        $node
            ->requiresAtLeastOneElement()
            ->useAttributeAsKey('name')
            ->prototype('array')
                ->children()
                    ->scalarNode('connection')->end()
                ->end()
                ->fixXmlConfig('mapping')
                ->children()
                    ->arrayNode('mappings')
                    ->requiresAtLeastOneElement()
                    ->prototype('scalar')->end()
            ->end()
        ;

        return $node;
    }

    private function addDbalSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
            ->arrayNode('dbal')
            ->append($this->getDbalConnectionsNode());
    }

    private function getDbalConnectionsNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('connections');

        /** @var $connectionNode ArrayNodeDefinition */
        $connectionNode = $node
            ->requiresAtLeastOneElement()
            ->useAttributeAsKey('name')
            ->prototype('array')
        ;

        $this->configureDbalDriverNode($connectionNode);

        $connectionNode
            ->children()
            ->scalarNode('driver')->defaultValue('pdo_mysql')->end();

        return $node;
    }

    private function configureDbalDriverNode(ArrayNodeDefinition $node)
    {
        $node
            ->children()
            ->scalarNode('dbname')->end()
            ->scalarNode('host')->defaultValue('localhost')->end()
            ->scalarNode('user')->defaultValue('root')->end()
            ->scalarNode('password')->defaultNull()->end()
        ;
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
