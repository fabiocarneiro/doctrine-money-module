<?php

return [
    'form_elements' => [
        'aliases' => [
            'money' => 'DoctrineMoneyModule\Form\Element\Money'
        ],
        'invokables' => [
            'DoctrineMoneyModule\Form\Element\Money' => 'DoctrineMoneyModule\Form\Element\Money'
        ]
    ],
    'view_helpers' => [
        'aliases' => [
            'money' => 'DoctrineMoneyModule\Form\View\Helper\FormMoney',
            'MoneyFormat' => 'DoctrineMoneyModule\View\Helper\MoneyFormat'
        ],
        'invokables' => [
            'DoctrineMoneyModule\Form\View\Helper\FormMoney' => 'DoctrineMoneyModule\Form\View\Helper\FormMoney',
            'DoctrineMoneyModule\View\Helper\MoneyFormat' => 'DoctrineMoneyModule\View\Helper\MoneyFormat'
        ]
    ],
    'doctrine' => [
        'driver' => [
            'money_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\PHPDriver',
                'paths' => [
                    __DIR__ . '/../src/Model/Mapping'
                ]
            ],
            'orm_default' => [
                'drivers' => [
                    'Money\Money' => 'money_driver'
                ],
            ],
        ],
        'connection' => [
            'orm_default' => [
                'doctrine_type_mappings' => [
                    'currency' => 'currency',
                ],
            ],
        ],
        'configuration' => [
            'orm_default' => [
                'types' => [
                    'currency' => 'DoctrineMoneyModule\DBAL\Types\CurrencyType',
                ],
            ],
        ],
    ],
];
