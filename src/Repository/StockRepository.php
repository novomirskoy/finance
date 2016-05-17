<?php

namespace Novomirskoy\Finance\Repository;

use Doctrine\ORM\EntityRepository;
use Novomirskoy\Finance\Model\StockInterface;
use Novomirskoy\Finance\Model\StockRepositoryInterface;

/**
 * Class StockRepository
 * @package Novomirskoy\Finance\Repository
 */
class StockRepository extends EntityRepository implements StockRepositoryInterface
{
    /**
     * Сохранение котировки
     *
     * @param StockInterface $stock
     *
     * @return void
     * 
     * @throws \Exception
     */
    public function store(StockInterface $stock)
    {
        $em = $this->getEntityManager();
        
        $em->beginTransaction();
        
        try {
            $em->persist($stock);
            $em->flush($stock);
            $em->commit();
        } catch (\Exception $e) {
            $em->rollback();
            throw $e;
        }
    }
}
