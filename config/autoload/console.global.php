<?php

use Novomirskoy\Finance\Command\Factory;
use Novomirskoy\Finance\Command;

return [
    'dependencies' => [
        'factories' => [
            Command\GeneratePhpstormMeta::class => Command\Factory\GeneratePhpstormMetaFactory::class,
        ],
    ],
    'console' => [
        'commands' => [
            Command\GeneratePhpstormMeta::class,
        ],
    ],
];
