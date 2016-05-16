<?php

namespace Novomirskoy\Finance\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Traversable;

/**
 * Class GeneratePhpstormMeta
 * @package Novomirskoy\Finance\Command
 */
class GeneratePhpstormMeta extends Command
{
    /**
     * @var Traversable|array
     */
    protected $containerConfig;

    public function __construct($name, $containerConfig)
    {
        $this->containerConfig = $containerConfig;

        parent::__construct($name);
    }

    /**
     * Configures the current command.
     */
    protected function configure()
    {
        $this
            ->setName('finance:generate-phpstorm-meta')
            ->setDescription('Генерирование метаданных для автокомплита получаемых данныз из контейнера зависимостей');
    }

    /**
     * Executes the current command.
     *
     * This method is not abstract because you can use this class
     * as a concrete class. In this case, instead of defining the
     * execute() method, you set the code to execute by passing
     * a Closure to the setCode() method.
     *
     * @param InputInterface $input An InputInterface instance
     * @param OutputInterface $output An OutputInterface instance
     *
     * @return null|int null or 0 if everything went fine, or an error code
     *
     * @throws LogicException When this abstract method is not implemented
     *
     * @see setCode()
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $containerConfig = $this->containerConfig;

        foreach ($containerConfig['factories'] as $serviceName => $factory) {
            $output->writeln($serviceName);
        }
    }
}
