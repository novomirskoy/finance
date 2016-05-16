<?php

namespace Novomirskoy\Finance\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Exception\ExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class ClearApplicationCache
 * @package Novomirskoy\Finance\Command
 */
class ClearApplicationCache extends Command
{
    /**
     * @var Filesystem
     */
    protected $fileSystemService;

    /**
     * @var Finder
     */
    protected $finder;

    /**
     * Constructor.
     *
     * @param string|null $name The name of the command; passing null means it must be set in configure()
     * @param Filesystem $fileSystemService
     * @parm Finder $finder
     *
     * @throws LogicException When the command name is empty
     */
    public function __construct($name, Filesystem $fileSystemService, Finder $finder)
    {
        $this->fileSystemService = $fileSystemService;
        $this->finder = $finder;

        parent::__construct($name);
    }

    /**
     * Configures the current command.
     */
    protected function configure()
    {
        $this
            ->setName('finance:clear-cache')
            ->setDescription('Удаление кеша приложения')
            ->addArgument(
                'path',
                InputArgument::OPTIONAL,
                'Путь к директории с кешем'
            )
        ;
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
        $cacheDirectory = $input->getArgument('path');

        if ($cacheDirectory) {
            $cacheDirectory = 'data/cache';
        }

        $fs = $this->fileSystemService;
        $finder = $this->finder;

        try {
            $finder->in($cacheDirectory);
            /** @var SplFileInfo $file */
            foreach ($finder as $file) {
                $fileType = $file->getType();
                $filePath = $file->getRealPath();
                
                $output->writeln(sprintf('<info>remove %s: %s</info>',$fileType, $filePath));
                $fs->remove($filePath);
            }
            
        } catch (ExceptionInterface $e) {
            $output->writeln(sprintf('<error>%s</error>', $e->getMessage()));
            exit(1);
        }
    }
}
