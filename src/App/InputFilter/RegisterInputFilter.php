<?php

namespace App\InputFilter;

use Zend\Filter;
use Zend\InputFilter\InputFilter;
use Zend\Validator;

/**
 * Class RegisterInputFilter
 * @package App\InputFilter
 */
class RegisterInputFilter extends InputFilter
{
    /**
     * RegisterInputFilter constructor.
     */
    public function __construct()
    {
        $this->add([
            'name' => 'name',
            'required' => true,
            'filters' => [
                ['name' => Filter\StringTrim::class],
                ['name' => Filter\StripTags::class],
            ],
            'validators' => [
                [
                    'name' => Validator\NotEmpty::class,
                    'options' => [
                        'type' => Validator\NotEmpty::STRING,
                    ],
                ],
                [
                    'name' => Validator\StringLength::class,
                    'options' => [
                        'min' => 3,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $this->add([
            'name' => 'lastName',
            'required' => true,
            'filters' => [
                ['name' => Filter\StringTrim::class],
                ['name' => Filter\StripTags::class],
            ],
            'validators' => [
                [
                    'name' => Validator\NotEmpty::class,
                    'options' => [
                        'type' => Validator\NotEmpty::STRING,
                    ],
                ],
                [
                    'name' => Validator\StringLength::class,
                    'options' => [
                        'min' => 3,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $this->add([
            'name' => 'username',
            'required' => true,
            'filters' => [
                ['name' => Filter\StringTrim::class],
                ['name' => Filter\StripTags::class],
            ],
            'validators' => [
                [
                    'name' => Validator\NotEmpty::class,
                    'options' => [
                        'type' => Validator\NotEmpty::STRING,
                    ],
                ],
                [
                    'name' => Validator\StringLength::class,
                    'options' => [
                        'min' => 3,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $this->add([
            'name' => 'email',
            'required' => true,
            'filters' => [
                ['name' => Filter\StringTrim::class],
                ['name' => Filter\StripTags::class],
            ],
            'validators' => [
                [
                    'name' => Validator\NotEmpty::class,
                    'options' => [
                        'type' => Validator\NotEmpty::STRING,
                    ],
                ],
                [
                    'name' => Validator\StringLength::class,
                    'options' => [
                        'min' => 3,
                        'max' => 100,
                    ],
                ],
                [
                    'name' => Validator\EmailAddress::class,
                ],
            ],
        ]);

        $this->add([
            'name' => 'password',
            'required' => true,
            'filters' => [
                ['name' => Filter\StringTrim::class],
                ['name' => Filter\StripTags::class],
            ],
            'validators' => [
                [
                    'name' => Validator\NotEmpty::class,
                    'options' => [
                        'type' => Validator\NotEmpty::STRING,
                    ],
                ],
                [
                    'name' => Validator\StringLength::class,
                    'options' => [
                        'min' => 6,
                        'max' => 50,
                    ],
                ],
            ],
        ]);

        $this->add([
            'name' => 'passwordVerify',
            'required' => true,
            'filters' => [
                ['name' => Filter\StringTrim::class],
                ['name' => Filter\StripTags::class],
            ],
            'validators' => [
                [
                    'name' => Validator\NotEmpty::class,
                    'options' => [
                        'type' => Validator\NotEmpty::STRING,
                    ],
                ],
                [
                    'name' => Validator\StringLength::class,
                    'options' => [
                        'min' => 6,
                        'max' => 50,
                    ],
                ],
                [
                    'name' => Validator\Identical::class,
                    'options' => [
                        'token' => 'password',
                    ],
                ]
            ],
        ]);
    }
}
