<?php

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'dependencies' => [
        'factories' => [
            Novomirskoy\Finance\Command\TestCommand::class => InvokableFactory::class
        ],
    ],
    'console' => [
        'commands' => [
            Novomirskoy\Finance\Command\TestCommand::class
        ],
    ],
];
