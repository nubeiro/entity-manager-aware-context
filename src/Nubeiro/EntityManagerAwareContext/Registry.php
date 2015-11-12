<?php
/**
 * ManagerRegistry
 */

namespace Nubeiro\EntityManagerAwareContext;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class Registry
{
    protected $registry;

    public function __construct($config)
    {
        $this->setupRegistry($config);
    }

    private function setupRegistry($config)
    {
        $connections = $config['dbal']['connections'];
        $managers = $config['orm']['entity_managers'];
        foreach ($managers as $name => $parameters) {
            $isDevMode = true;
            $config = Setup::createYAMLMetadataConfiguration(
                $parameters['mappings'],
                $isDevMode
            );
            $connection = $parameters['connection'];
            $manager = EntityManager::create($connections[$connection], $config);
            $this->registry[$name] = $manager;
        }
    }

    /**
     * Returns Doctrine EntityManager by name.
     *
     * @param string $name
     *
     * @return EntityManager
     */
    public function getManager($name)
    {
        if (!empty($this->registry[$name])) {
            return $this->registry[$name];
        }

        throw new \RuntimeException(sprintf('Entity manager with name: %s not found!', $name));
    }
}
