<?php

namespace Novomirskoy\Finance\Command\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Novomirskoy\Finance\Command\ClearApplicationCache;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ClearApplicationCacheFactory
 * @package Novomirskoy\Finance\Command\Factory
 */
class ClearApplicationCacheFactory implements FactoryInterface
{
    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ClearApplicationCache(null, new Filesystem(), new Finder());
    }
}
