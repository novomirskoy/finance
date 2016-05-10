<?php
declare(strict_types=1);

namespace Novomirskoy\Finance\Model;

use DateTime;

/**
 * Interface StockInterface
 * @package Novomirskoy\Finance\Model
 */
interface StockInterface
{
    /**
     * Получение даты
     *
     * @return DateTime
     */
    public function getDate(): DateTime;

    /**
     * Получение цены открытия
     *
     * @return string
     */
    public function getOpen(): string;

    /**
     * Получение максимальной цены
     *
     * @return string
     */
    public function getHigh(): string;

    /**
     * Получение миимальной цены
     *
     * @return string
     */
    public function getLow(): string;

    /**
     * Получение цены закрытия
     *
     * @return string
     */
    public function getClose(): string;

    /**
     * Получение биржевого объема
     * 
     * @return string
     */
    public function getVolume(): string;

    /**
     * Получение скорректированной цены закрытия
     * 
     * @return string
     */
    public function getAdjustedClose(): string;
}
