<?php

use Jaxon\Demo\Service\Example;
use Jaxon\Demo\Service\ExampleInterface;

$directory = rtrim(\Yii::getAlias('@app'), '/') . '/jaxon/ajax';

return [
    'app' => [
        'directories' => [
            $directory => [
                'namespace' => '\\Jaxon\\Ajax',
                // 'separator' => '', // '.' or '_'
                // 'protected' => [],
            ],
        ],
        'container' => [
            'auto' => [
                Example::class,
            ],
            'alias' => [
                ExampleInterface::class => Example::class
            ],
        ],
    ],
    'lib' => [
        'core' => [
            'language' => 'en',
            'encoding' => 'UTF-8',
            'request' => [
                'uri' => 'jaxon',
            ],
            'prefix' => [
                'class' => '',
            ],
            'debug' => [
                'on' => false,
                'verbose' => false,
            ],
            'error' => [
                'handle' => false,
            ],
        ],
        'js' => [
            'lib' => [
                // 'uri' => '/jaxon/lib',
            ],
            'app' => [
                // 'uri' => '',
                // 'dir' => '',
                'export' => false,
                'minify' => false,
            ],
        ],
        'dialogs' => [
            'libraries' => ['pgwjs'],
            'default' => [
                'modal' => 'bootstrap',
                'message' => 'toastr',
            ],
            'toastr' => [
                'options' => [
                    'closeButton' => true,
                    'positionClass' => 'toast-top-center'
                ],
            ],
            'assets' => [
                'include' => [
                    'all' => true,
                ],
            ],
        ],
    ],
];
