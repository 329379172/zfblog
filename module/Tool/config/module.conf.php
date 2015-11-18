<?php
/**
 * Created by PhpStorm.
 * User: linfeiyang
 * Date: 2015/11/18
 * Time: 21:30
 */

return [
    'router' => [
        'routes' => [
            'tool' => [
                'type' => 'literal',
                'options' => [
                    'route' => '/tool'
                ],
                'child_routes' => [
                    'longdai' => [
                        'type' => 'literal',
                        'options' => [
                            'route' => '/longdai',
                        ],
                        'child_routes' => [
                            'longdai' => [
                                'type' => 'literal',
                                'options' => [
                                    'route' => '/redbag',
                                    'defaults' => [
                                        'controller' => 'LongDaiController',
                                        'action' => 'grabRedBag'
                                    ]
                                ],
                                'may_terminate' => true
                            ]
                        ]
                    ]
                ]
            ]
        ],
    ],
    'controllers' => [
        'invokables' => [
            'LongDaiController' => 'Tool\Controller\LongDaiController',
        ]
    ]
];