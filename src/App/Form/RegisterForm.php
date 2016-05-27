<?php

namespace App\Form;

use Zend\Form\Element;
use Zend\Form\Form;

/**
 * Class RegisterForm
 * @package App\Form
 */
class RegisterForm extends Form
{
    /**
     * This function is automatically called when creating element with factory. It
     * allows to perform various operations (add elements...)
     *
     * @return void
     */
    public function init()
    {
        parent::init();

        $this->add([
            'name' => 'name',
            'type' => Element\Text::class,
            'options' => [],
            'attributes' => [],
        ]);

        $this->add([
            'name' => 'lastName',
            'type' => Element\Text::class,
            'options' => [],
            'attributes' => [],
        ]);

        $this->add([
            'name' => 'username',
            'type' => Element\Text::class,
            'options' => [],
            'attributes' => [],
        ]);

        $this->add([
            'name' => 'email',
            'type' => Element\Email::class,
            'options' => [],
            'attributes' => [],
        ]);

        $this->add([
            'name' => 'password',
            'type' => Element\Password::class,
            'options' => [],
            'attributes' => [],
        ]);

        $this->add([
            'name' => 'passwordVerify',
            'type' => Element\Password::class,
            'options' => [],
            'attributes' => [],
        ]);
    }
}
