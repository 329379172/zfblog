<?php
return [
    'router' => [
        'routes' => [
            'api' => [
                'type' => 'literal',
                'options' => [
                    'route' => '/api'
                ],
                'child_routes' => [
                    'taobao' => [
                        'type' => 'literal',
                        'options' => [
                            'route' => '/taobao',
                        ],
                        'child_routes' => [
                            'info' => [
                                'type' => 'segment',
                                'options' => [
                                    'route'=> '/info/[:name]',
                                    'defaults' => [
                                        'controller' => 'Api\Controller\IndexController',
                                        'action' => 'getTaobaoUserInfo'
                                    ],
                                    'constraints' => [
                                        'name' => '[^\']+'
                                    ]
                                ],
                                'may_terminate' => true,
                            ]

                        ]
                    ],
                    'postcode' => [
                        'type' => 'segment',
                        'options' => [
                            'route' => '/postcode/[:name]',
                            'defaults' => [
                                'controller' => 'Api\Controller\IndexController',
                                'action' => 'getPostCode'
                            ],
                            'constraints' => [
                                'name' => '[^\']+'
                            ]
                        ],
                        'may_terminate' => true,
                    ]
                ]
            ]
        ]
    ],
    'controllers' => [
        'invokables' => [
            'Api\Controller\IndexController' => 'Api\Controller\IndexController',
        ]
    ]
];