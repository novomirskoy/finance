<?php

use Novomirskoy\Finance\Command\Factory;
use Novomirskoy\Finance\Command;

return [
    'dependencies' => [
        'factories' => [
            Command\GeneratePhpstormMeta::class => Command\Factory\GeneratePhpstormMetaFactory::class,
            Command\ClearApplicationCache::class => Command\Factory\ClearApplicationCacheFactory::class,
            Command\GetQuotes::class => Command\Factory\GetQuotesFactory::class,
        ],
    ],
    'console' => [
        'commands' => [
            Command\GeneratePhpstormMeta::class,
            Command\ClearApplicationCache::class,
            Command\GetQuotes::class,
        ],
    ],
];
