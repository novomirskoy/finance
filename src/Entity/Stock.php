<?php
declare(strict_types=1);

namespace Novomirskoy\Finance\Entity;

use DateTime;
use Novomirskoy\Finance\Model\StockInterface;

/**
 * Class Stock
 * @package Novomirskoy\Finance\Entity
 */
class Stock implements StockInterface
{
    /**
     * Дата
     *
     * @var DateTime
     */
    protected $date;

    /**
     * Цена открытия
     *
     * @var string
     */
    protected $open;

    /**
     * Максимальная цена
     *
     * @var string
     */
    protected $high;

    /**
     * Минимальная цена
     * 
     * @var string
     */
    protected $low;

    /**
     * Цена закрытия
     * 
     * @var string
     */
    protected $close;

    /**
     * Биржевой объем
     * 
     * @var string
     */
    protected $volume;

    /**
     * Скорректированная цена закрытия
     * 
     * @var string
     */
    protected $adjustedClose;

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     *
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getOpen(): string
    {
        return $this->open;
    }

    /**
     * @param string $open
     *
     * @return $this
     */
    public function setOpen(string $open)
    {
        $this->open = $open;
        return $this;
    }

    /**
     * @return string
     */
    public function getHigh(): string
    {
        return $this->high;
    }

    /**
     * @param string $high
     *
     * @return $this
     */
    public function setHigh(string $high)
    {
        $this->high = $high;
        return $this;
    }

    /**
     * @return string
     */
    public function getLow(): string
    {
        return $this->low;
    }

    /**
     * @param string $low
     *
     * @return $this
     */
    public function setLow(string $low)
    {
        $this->low = $low;
        return $this;
    }

    /**
     * @return string
     */
    public function getClose(): string
    {
        return $this->close;
    }

    /**
     * @param string $close
     *
     * @return $this
     */
    public function setClose(string $close)
    {
        $this->close = $close;
        return $this;
    }

    /**
     * @return string
     */
    public function getVolume(): string
    {
        return $this->volume;
    }

    /**
     * @param string $volume
     *
     * @return $this
     */
    public function setVolume(string $volume)
    {
        $this->volume = $volume;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdjustedClose(): string
    {
        return $this->adjustedClose;
    }

    /**
     * @param string $adjustedClose
     *
     * @return $this
     */
    public function setAdjustedClose(string $adjustedClose)
    {
        $this->adjustedClose = $adjustedClose;
        return $this;
    }
}
