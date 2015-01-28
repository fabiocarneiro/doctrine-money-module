<?php

return [
    'view_helpers' => [
        'aliases' => [
            'MoneyFormat' => 'DoctrineMoneyModule\View\Helper\MoneyFormat'
        ],
        'invokables' => [
            'DoctrineMoneyModule\View\Helper\MoneyFormat' => 'DoctrineMoneyModule\View\Helper\MoneyFormat'
        ]
    ],
    'doctrine' => [
        'driver' => [
            'money_driver' => [
                'class' => 'Doctrine\Common\Persistence\Mapping\Driver\PHPDriver',
                'paths' => [
                    __DIR__ . '/../mapping/PHPDriver'
                ]
            ],
        ],
    ],
];
