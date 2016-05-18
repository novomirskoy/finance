<?php

return [
    'dependencies' => [
        'factories' => [
            Doctrine\Common\Cache\Cache::class => Novomirskoy\Finance\Container\DoctrineArrayCacheFactory::class,
            Doctrine\ORM\EntityManager::class => Novomirskoy\Finance\Container\DoctrineFactory::class,
        ],
    ],
    
    'doctrine' => [
        'orm' => [
            'auto_generate_proxy_classes' => true,
            'proxy_dir' => 'data/cache/EntityProxy',
            'proxy_namespace' => 'EntityProxy',
            'underscore_naming_strategy' => true,
        ],
        
        'connection' => [
            'orm_default' => [
                'driver' => 'pdo_sqlite',
                'path' => 'data/db/finance.db',
            ],
        ],

        'cache' => [

        ],
    ],
];
