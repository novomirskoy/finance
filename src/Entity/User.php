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
     * Имя
     * 
     * @var string
     * 
     * @ORM\Column(name="name", type="string", nullable=true)
     */
    protected $name;

    /**
     * Фамилия
     * 
     * @var string
     * 
     * @ORM\Column(name="last_name", type="string", nullable=true)
     */
    protected $lastName;

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
     * Email
     * 
     * @var string
     * 
     * @ORM\Column(name="email", type="string", unique=true, nullable=true)
     */
    protected $email;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * 
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;
        
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * 
     * @return $this
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
        
        return $this;
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

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * 
     * @return $this
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
        
        return $this;
    }
}
