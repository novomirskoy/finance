<?php

namespace Novomirskoy\Finance\Exception;

use RuntimeException;
use Symfony\Component\Console\Exception\ExceptionInterface;

/**
 * Class ContainerNotRegisteredException
 * @package Novomirskoy\Finance\Exception
 */
class ContainerNotRegisteredException extends RuntimeException implements ExceptionInterface
{

}