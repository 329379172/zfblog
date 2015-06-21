<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/6/15
 * Time: 下午2:50
 */
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
                                        'controller' => 'Blog\Controller\Api\IndexController',
                                        'action' => 'getTaobaoUserInfo'
                                    ],
                                    'constraints' => [
                                        'name' => '[^\']+'
                                    ]
                                ]
                            ]

                        ]
                    ]
                ]
            ],
            'home' => [
                'type' => 'Literal',
                'options' => [
                    'route'    => '/admin',
                    'defaults' =>[
                        'controller' => 'Blog\Controller\Admin\IndexController',
                        'action'     => 'index',
                    ]
                ]
            ],
            'login' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/admin/login',
                    'defaults' => [
                        'controller' => 'Blog\Controller\Admin\IndexController',
                        'action'    => 'login'
                    ]
                ]
            ]
        ]
    ],
    'controllers' => [
        'invokables' => [
            'Blog\Controller\Admin\IndexController' => 'Blog\Controller\Admin\IndexController',
            'Blog\Controller\Api\IndexController' => 'Blog\Controller\Api\IndexController'
        ]
    ],
    'password_additional' => 'linfeiyang'
];