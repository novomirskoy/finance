<?php

namespace Novomirskoy\Finance\Command\Factory;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Novomirskoy\Finance\Command\LoadFixtures;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class LoadFixturesFactory
 * @package Novomirskoy\Finance\Command\Factory
 */
class LoadFixturesFactory implements FactoryInterface
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
        $objectManager = $container->get(EntityManager::class);
        
        $config = $container->has('config') ? $container->get('config') : [];
        $fixtureDirectories = $config['doctrine']['fixture'] ?? [];
        
        return new LoadFixtures(null, $objectManager, $fixtureDirectories);
    }
}
