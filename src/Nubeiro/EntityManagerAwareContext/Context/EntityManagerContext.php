<?php
/**
 * RawManagerRegistryContext
 */

namespace Nubeiro\EntityManagerAwareContext\Context;


use Nubeiro\EntityManagerAwareContext\Registry;

class EntityManagerContext implements EntityManagerAwareContext
{
    private $registry;

    /**
     * @param Registry $registry
     */
    public function setRegistry(Registry $registry)
    {
        $this->registry = $registry;
    }

    public function getRegistry()
    {
        if (null === $this->registry) {
            throw new \RuntimeException(
                'ManagerRegistry instance has not been set on ManagerRegistry context class.'
            );
        }

        return $this->registry;
    }
}