<?php
declare(strict_types=1);

namespace Novomirskoy\Finance\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Novomirskoy\Finance\Entity\User;

/**
 * Class UserLoadData
 * @package Novomirskoy\Finance\DataFixtures\ORM
 */
class UserLoadData implements FixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setPassword('admin');

        $manager->persist($user);

        $user = new User();
        $user->setUsername('user');
        $user->setPassword('user');

        $manager->persist($user);

        $manager->flush();
    }
}
