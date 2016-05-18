<?php
declare(strict_types=1);

namespace Novomirskoy\Finance\Command;

use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class LoadFixtures
 * @package Novomirskoy\Finance\Command
 */
class LoadFixtures extends Command
{
    /**
     * Директории с фикстурами
     *
     * @var array
     */
    protected $fixtureDirectories;

    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * Constructor.
     *
     * @param string|null $name The name of the command; passing null means it must be set in configure()
     * @param ObjectManager $objectManager
     * @param array $fixtureDirectories
     *
     * @throws LogicException When the command name is empty
     */
    public function __construct($name, ObjectManager $objectManager, array $fixtureDirectories)
    {
        $this->objectManager = $objectManager;
        $this->fixtureDirectories = $fixtureDirectories;

        parent::__construct($name);
    }

    /**
     * Configures the current command.
     */
    protected function configure()
    {
        $this
            ->setName('finance:data-fixture:load')
            ->setDescription('Загрузить фикстуры');
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
        $loader = new Loader();
        foreach ($this->fixtureDirectories as $directory) {
            $loader->loadFromDirectory($directory);
        }

        $purger = new ORMPurger();
        $executor = new ORMExecutor($this->objectManager, $purger);
        $executor->execute($loader->getFixtures());
    }
}
