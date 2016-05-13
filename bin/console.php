<?php

use Symfony\Component\Console\Application;
use Interop\Container\ContainerInterface;

require_once __DIR__ . '/../vendor/autoload.php';

/** @var ContainerInterface $container */
$container = require __DIR__ . '/../config/container.php';

$application = new Application('Application console');

$commands = $container->get('config')['console']['commands'];
foreach ($commands as $command) {
    $application->add($container->get($command));
}

$application->run();