<?php

namespace Novomirskoy\Finance\Model;

/**
 * Interface StockRepositoryInterface
 * @package Novomirskoy\Finance\Model
 */
interface StockRepositoryInterface
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
