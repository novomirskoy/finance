<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\FastRouteRouter::class,
        ],
        'factories' => [
//            App\Action\HomeAction::class => App\Action\HomeActionFactory::class,
        ],
        'abstract_factories' => [
            App\Action\AbstractActionFactory::class,
        ],
    ],
    
    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => App\Action\HomeAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'createUser',
            'path' => '/user/create',
            'middleware' => App\Action\User\CreateAction::class,
            'allowed_methods' => ['GET'],
        ],
    ],
];