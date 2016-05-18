<?php
declare(strict_types=1);

namespace Novomirskoy\Finance\Entity;

use Doctrine\ORM\Mapping as ORM;
use Novomirskoy\Finance\Model\UserInterface;

/**
 * Class User
 * @package Novomirskoy\Finance\Entity
 *
 * @ORM\Entity(repositoryClass="Novomirskoy\Finance\Repository\UserRepository")
 * @ORM\Table(name="users")
 */
class User implements UserInterface
{
    /**
     * Идентификатор пользователя
     * 
     * @var int
     * 
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="id", type="integer")
     */
    protected $id;

    /**
     * Имя пользователя
     *
     * @var string
     * 
     * @ORM\Column(name="username", type="string", nullable=false)
     */
    protected $username;

    /**
     * Пароль
     *
     * @var string
     * 
     * @ORM\Column(name="password", type="string", nullable=false)
     */
    protected $password;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return $this
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return $this
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
        return $this;
    }
}
