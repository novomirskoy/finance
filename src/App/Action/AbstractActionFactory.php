<?php

namespace App\Action;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use ReflectionClass;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\AbstractFactoryInterface;

/**
 * Class AbstractActionFactory
 * @package App\Action
 */
class AbstractActionFactory implements AbstractFactoryInterface
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
        $reflection = new ReflectionClass($requestedName);
        
        $constructor = $reflection->getConstructor();
        
        if (null === $constructor) {
            return new $requestedName;
        }
        
        $parameters = $constructor->getParameters();
        $dependencies = [];
        foreach ($parameters as $parameter) {
            $class = $parameter->getClass();
            
            $dependencies[] = $container->get($class->getName());
        }
        
        return $reflection->newInstanceArgs($dependencies);
    }

    /**
     * Can the factory create an instance for the service?
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @return bool
     */
    public function canCreate(ContainerInterface $container, $requestedName)
    {
        if (substr($requestedName, -6) === 'Action') {
            return true;
        }
        
        return false;
    }
}
