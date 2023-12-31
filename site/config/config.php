<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen. 
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */
return [
    'debug' => true,
    'email' => [
        'transport' => [
            'type' => 'smtp',
            'host' => 'localhost',
            'port' => 1025,
            'security' => false
        ]
    ],
    // see https://getkirby.com/docs/reference/system/options/auth#login-methods
    'auth' => [
        'methods' => ['password', 'code']
    ],
    'routes' => [
        [
            'pattern' => 'logout',
            'action'  => function() {
                if ($user = kirby()->user()) {
                    $user->logout();
                }

                go('login');

            }
        ]
    ],
];
