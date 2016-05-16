<?php

return [
    'dependencies' => [
        'factories' => [
            Doctrine\Common\Cache\Cache::class => Novomirskoy\Finance\Container\DoctrineArrayCacheFactory::class,
            Doctrine\ORM\EntityManager::class => Novomirskoy\Finance\Container\DoctrineFactory::class,
        ],
    ],    
];
