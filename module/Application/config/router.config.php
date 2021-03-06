<?php

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

return [
    'routes' => [

        'home' => [
            'type' => Literal::class,
            'options' => [
                'route'    => '/',
                'defaults' => [
                    'controller' => Controller\IndexController::class,
                    'action'     => 'gameInfo',
                ],
            ],
        ],

        'admin-info' => [
            'type' => Literal::class,
            'options' => [
                'route'    => '/admininfo',
                'defaults' => [
                    'controller' => Controller\IndexController::class,
                    'action'     => 'adminInfo',
                ],
            ],
        ],

        'scoreboard' => [
            'type' => Literal::class,
            'options' => [
                'route'    => '/scoreboard',
                'defaults' => [
                    'controller' => Controller\IndexController::class,
                    'action'     => 'scoreBoard',
                ],
            ],
        ],

        'database' => [
            'type' => Literal::class,
            'options' => [
                'route'    => '/database',
                'defaults' => [
                    'controller' => Controller\IndexController::class,
                    'action'     => 'database',
                ],
            ],
        ],

        'player-info' => [
            'type'    => Segment::class,
            'options' => [
                'route'    => '/playerinfo[:mod]/:nick',
                'constraints' => [
                    'mod' => '-full-events',
                    'nick' => '[a-zA-Z0-9_.-]+',
                ],
                'defaults' => [
                    'controller'    => Controller\IndexController::class,
                    'action'        => 'playerInfo',
                ],
            ],
        ],

        'world-map' => [
            'type'    => Segment::class,
            'options' => [
                'route'    => '/worldmap',
                'defaults' => [
                    'controller'    => Controller\IndexController::class,
                    'action'        => 'worldMap',
                ],
            ],
        ],

        'quest-info' => [
            'type'    => Segment::class,
            'options' => [
                'route'    => '/quest',
                'defaults' => [
                    'controller'    => Controller\IndexController::class,
                    'action'        => 'questInfo',
                ],
            ],
        ],

        'recent-events' => [
            'type'    => Segment::class,
            'options' => [
                'route'    => '/recent',
                'defaults' => [
                    'controller'    => Controller\IndexController::class,
                    'action'        => 'recentEvents',
                ],
            ],
        ],

        'api' => [
            'type'    => Segment::class,
            'options' => [
                'route'    => '/api',
            ],
            'may_terminate' => false,
            'child_routes' => [
                'database' => [
                    'type' => Literal::class,
                    'options' => [
                        'route'    => '/database',
                        'defaults' => [
                            'controller' => Controller\JsonController::class,
                            'action'     => 'database',
                        ],
                    ],
                ],
            ],
        ],

    ],
];
