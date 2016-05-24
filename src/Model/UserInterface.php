<?php
declare(strict_types=1);

namespace Novomirskoy\Finance\Model;

/**
 * Class UserInterface
 * @package Novomirskoy\Finance\Model
 */
interface UserInterface
{
    /**
     * Получение имени
     * 
     * @return string
     */
    public function getName(): string;

    /**
     * Получение фамилии
     * 
     * @return string
     */
    public function getLastName(): string;
    
    /**
     * Получение имени пользователя
     * 
     * @return string
     */
    public function getUsername(): string;

    /**
     * Получение пароля
     * 
     * @return string
     */
    public function getPassword(): string;

    /**
     * Получение Email
     * 
     * @return string
     */
    public function getEmail(): string;
}
