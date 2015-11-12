<?php
/**
 * ManagerRegistryAwareInitializer
 */

namespace Nubeiro\EntityManagerAwareContext\Context\Initializer;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\Initializer\ContextInitializer;
use Nubeiro\EntityManagerAwareContext\Context\EntityManagerAwareContext;
use Nubeiro\EntityManagerAwareContext\Registry;

class EntityManagerAwareInitializer implements ContextInitializer
{
    /**
     * @var ManagerRegistry Registry of entity managers.
     */
    private $registry;

    /**
     * @param Registry $registry Registry of entity managers.
     */
    public function __construct(Registry $registry)
    {

        $this->registry = $registry;
    }

    /**
     * Initializes provided context.
     *
     * @param Context $context
     */
    public function initializeContext(Context $context)
    {
        if (!$context instanceof EntityManagerAwareContext) {
            return;
        }

        $context->setManagerRegistry($this->registry);
    }
}