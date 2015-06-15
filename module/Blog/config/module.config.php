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
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => [
                    'route'    => '/blog',
                    'defaults' =>[
                        'controller' => 'Blog\Controller\Index',
                        'action'     => 'index',
                    ]
                ]
            ]
        ]
    ],
    'controllers' => [
        'invokables' => [
            'Blog\Controller\Index' => 'Blog\Controller\IndexController'
        ]
    ]
];