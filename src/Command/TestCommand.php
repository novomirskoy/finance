<?php

namespace Novomirskoy\Finance\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class TestCommand
 * @package Novomirskoy\Finance\Command
 */
class TestCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('finance:test');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Hello command!</info>');
    }
}
