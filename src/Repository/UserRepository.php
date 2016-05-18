<?php
declare(strict_types=1);

namespace Novomirskoy\Finance\Repository;

use Doctrine\ORM\EntityRepository;
use Exception;
use Novomirskoy\Finance\Model\UserRepositoryInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class UserRepository
 * @package Novomirskoy\Finance\Repository
 */
class UserRepository extends EntityRepository implements UserRepositoryInterface
{
    /**
     * Сохранение пользователя
     *
     * @param UserInterface $user
     *
     * @return void
     *
     * @throws Exception
     */
    public function store(UserInterface $user)
    {
        $em = $this->getEntityManager();

        $em->beginTransaction();

        try {
            $em->persist($user);
            $em->flush($user);
            $em->commit();
        } catch (Exception $e) {
            $em->rollback();
            throw $e;
        }
    }
}
