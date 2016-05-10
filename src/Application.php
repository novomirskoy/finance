<?php
declare(strict_types=1);

namespace Novomirskoy\Finance;

use Interop\Container\ContainerInterface;

/**
 * Class Application
 * @package Novomirskoy\Finance
 */
class Application
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Application constructor.
     * 
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }
}
