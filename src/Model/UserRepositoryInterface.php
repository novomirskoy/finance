<?php
declare(strict_types=1);

namespace Novomirskoy\Finance\Model;

use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class UserRepositoryInterface
 * @package Novomirskoy\Finance\Model
 */
interface UserRepositoryInterface extends ObjectRepository
{
    /**
     * Сохранение пользователя
     *
     * @param UserInterface $user
     *
     * @return void
     */
    public function store(UserInterface $user);
}
