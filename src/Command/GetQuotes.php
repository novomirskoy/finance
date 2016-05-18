<?php

namespace Novomirskoy\Finance\Command;

use DateTime;
use League\Period\Period;
use Novomirskoy\Finance\Entity\Stock;
use Novomirskoy\Finance\Hydrator\StockHydrator;
use Novomirskoy\Finance\Model\StockRepositoryInterface;
use Scheb\YahooFinanceApi\ApiClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class GetQuotes
 * @package Novomirskoy\Finance\Command
 */
class GetQuotes extends Command
{
    /**
     * @var ApiClient
     */
    protected $yahooApiClient;

    /**
     * @var StockRepositoryInterface
     */
    protected $stockRepository;

    /**
     * Constructor.
     *
     * @param string|null $name The name of the command; passing null means it must be set in configure()
     * @param ApiClient $yahooApiClient
     * @param StockRepositoryInterface $stockRepository
     *
     * @throws LogicException When the command name is empty
     */
    public function __construct($name, ApiClient $yahooApiClient, StockRepositoryInterface $stockRepository)
    {
        $this->yahooApiClient = $yahooApiClient;
        $this->stockRepository = $stockRepository;
        
        parent::__construct($name);
    }

    /**
     * Configures the current command.
     */
    protected function configure()
    {
        $this
            ->setName('finance:get-quotes')
            ->setDescription('Получить котировки')
            ->addOption(
                'symbol',
                null,
                InputOption::VALUE_REQUIRED
            )
            ->addOption(
                'start',
                null,
                InputOption::VALUE_REQUIRED,
                ''
            )
            ->addOption(
                'end',
                null,
                InputOption::VALUE_OPTIONAL,
                '',
                (new DateTime())->format('Y-m-d')
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
        $symbol = $input->getOption('symbol');
        $start = new DateTime($input->getOption('start'));
        $end = new DateTime($input->getOption('end'));

        $result = $this->getQuotes($symbol, $start, $end);

        if (count($result) === 0) {
            $output->writeln('<info>Котировки не найдены</info>');
            exit();
        }
        
        foreach ($result as $quote) {
            if (!is_array($quote)) {
                $stock = $this->saveStock($result['quote']);
                $output->writeln(sprintf('<info>Сохранение котировки от: %s</info>', $stock->getDate()->format('Y-m-d')));
                
                break;
            }

            $stock = $this->saveStock($quote);
            $output->writeln(sprintf('<info>Сохранение котировки от: %s</info>', $stock->getDate()->format('Y-m-d')));
        }
    }

    /**
     * @param array $data
     * 
     * @return Stock
     */
    private function saveStock(array $data): Stock
    {
        $stock = (new StockHydrator())
            ->hydrate($data, new Stock());

        if (!$this->stockRepository->findOneBy(['date' => $stock->getDate()])) {
            $this->stockRepository->store($stock);    
        }
        
        return $stock;
    }

    /**
     * @param string $symbol
     * @param DateTime $start
     * @param DateTime $end
     * 
     * @return array
     */
    private function getQuotes(string $symbol, DateTime $start, DateTime $end): array
    {
        $api = $this->yahooApiClient;
        $result = [];

        $period = new Period($start, $end);

        /** @var Period $interval */
        foreach ($period->split('1 month') as $interval) {
            $start = new DateTime($interval->getStartDate()->format(DATE_W3C));
            $end = new DateTime($interval->getEndDate()->format(DATE_W3C));
            
            $quotes = $api->getHistoricalData($symbol, $start, $end);
            sleep(2);

            if ($quotes['query']['count'] === 0) {
                break;
            }

            $result = array_merge($result, $quotes['query']['results']['quote']);
        }

        return $result;
    }
}
