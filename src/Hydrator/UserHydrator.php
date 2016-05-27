<?php

namespace Novomirskoy\Finance\Hydrator;

use Novomirskoy\Finance\Model\UserInterface;
use Zend\Hydrator\HydratorInterface;

/**
 * Class UserHydrator
 * @package Novomirskoy\Finance\Hydrator
 */
class UserHydrator implements HydratorInterface
{
    /**
     * Extract values from an object
     *
     * @param  UserInterface $user
     * 
     * @return array
     */
    public function extract($user)
    {
        // TODO: Implement extract() method.
    }

    /**
     * Hydrate $object with the provided $data.
     *
     * @param  array $data
     * @param  UserInterface $user
     * 
     * @return UserInterface
     */
    public function hydrate(array $data, $user)
    {
        // TODO: Implement hydrate() method.
    }
}
