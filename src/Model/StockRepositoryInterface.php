<?php

namespace Novomirskoy\Finance\Model;

use Doctrine\Common\Persistence\ObjectRepository;

/**
 * Interface StockRepositoryInterface
 * @package Novomirskoy\Finance\Model
 */
interface StockRepositoryInterface extends ObjectRepository
{
    /**
     * Сохранение котировки
     * 
     * @param StockInterface $stock
     * 
     * @return void
     */
    public function store(StockInterface $stock);
}
