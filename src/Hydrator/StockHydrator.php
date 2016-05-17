<?php

namespace Novomirskoy\Finance\Hydrator;

use DateTime;
use Novomirskoy\Finance\Entity\Stock;
use Zend\Hydrator\HydratorInterface;

/**
 * Class StockHydrator
 * @package Novomirskoy\Finance\Hydrator
 */
class StockHydrator implements HydratorInterface
{
    /**
     * Extract values from an object
     *
     * @param  Stock $object
     * @return array
     */
    public function extract($object)
    {
        return [
            'Date' => $object->getDate()->format('Y-m-d'),
            'Open' => $object->getOpen(),
            'High' => $object->getHigh(),
            'Low' => $object->getLow(),
            'Close' => $object->getClose(),
            'Volume' => $object->getVolume(),
            'Adj_Close' => $object->getAdjustedClose(),
        ];
    }

    /**
     * Hydrate $object with the provided $data.
     *
     * @param  array $data
     * @param  Stock $object
     * @return Stock
     */
    public function hydrate(array $data, $object)
    {
        $object->setDate(new DateTime($data['Date']));
        $object->setOpen($data['Open']);
        $object->setHigh($data['High']);
        $object->setLow($data['Low']);
        $object->setClose($data['Close']);
        $object->setVolume($data['Volume']);
        $object->setAdjustedClose($data['Adj_Close']);
        
        return $object;
    }
}
