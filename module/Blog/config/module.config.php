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
            'home' => [
                'type' => 'Literal',
                'options' => [
                    'route'    => '/admin',
                    'defaults' =>[
                        'controller' => 'Admin\Index',
                        'action'     => 'index',
                    ]
                ]
            ],
            'login' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/admin/login',
                    'defaults' => [
                        'controller' => 'Admin\Index',
                        'action'    => 'login'
                    ]
                ]
            ]
        ]
    ],
    'controllers' => [
        'invokables' => [
            'Admin\Index' => 'Blog\Controller\Admin\IndexController'
        ]
    ],
    'password_additional' => 'linfeiyang'
];