<?php

namespace Novomirskoy\Finance\Service\User;

use App\Form\RegisterForm;
use App\InputFilter\RegisterInputFilter;
use Novomirskoy\Finance\Entity\User;
use Novomirskoy\Finance\Hydrator\UserHydrator;
use Novomirskoy\Finance\Model\UserInterface;
use Novomirskoy\Finance\Service\User\Exception\InvalidDataException;

/**
 * Class RegisterService
 * @package Novomirskoy\Finance\Service\User
 */
class RegisterService
{
    /**
     * @var RegisterForm
     */
    protected $form;

    /**
     * @var RegisterInputFilter
     */
    protected $inputFilter;

    /**
     * @var UserHydrator
     */
    protected $hydrator;

    public function __construct(UserHydrator $hydrator, RegisterForm $form, RegisterInputFilter $inputFilter)
    {
        $this->hydrator = $hydrator;
        $this->form = $form;
        $this->inputFilter = $inputFilter;
    }

    /**
     * @param array $data
     * 
     * @return UserInterface
     *
     * @throws InvalidDataException
     */
    public function register(array $data)
    {
        $user = new User();
        
        $form = $this->form;
        $hydrator = $this->hydrator;
        $inputFilter = $this->inputFilter;
        
        $form->setHydrator($hydrator);
        $form->setInputFilter($inputFilter);

        $form->bind($user);
        $form->setData($data);
        
        if (!$form->isValid()) {
            throw new InvalidDataException();
        }
        
        $user = $form->getData();
        
        return $user;
    }
}
