<?php
/**
 * DoctrineAwareContext
 */

namespace Nubeiro\EntityManagerAwareContext\Context;

use Behat\Behat\Context\Context;
use Nubeiro\EntityManagerAwareContext\Registry;

interface EntityManagerAwareContext extends Context
{
    public function setRegistry(Registry $registry);
    public function getRegistry();
}