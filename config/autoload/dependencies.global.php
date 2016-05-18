<?php

use Novomirskoy\Finance\Model;
use Novomirskoy\Finance\Repository;
use Zend\Expressive\Application;
use Zend\Expressive\Container\ApplicationFactory;
use Zend\Expressive\Helper;

return [
    'dependencies' => [
        'invokables' => [
            Helper\ServerUrlHelper::class => Helper\ServerUrlHelper::class,
        ],
        
        'factories' => [
            Application::class => ApplicationFactory::class,
            Helper\UrlHelper::class => Helper\UrlHelperFactory::class,
            
            Model\StockRepositoryInterface::class => Repository\StockRepositoryFactory::class,
        ],
    ],    
];
