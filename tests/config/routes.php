<?php
/**
 * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

use Cake\Core\Configure;
use Cake\Routing\Router;

Router::plugin('CakeDC/Users', function ($routes) {
    $routes->fallbacks('DashedRoute');
});

Router::scope('/auth', function ($routes) {
    $routes->connect(
        '/*',
        Configure::read('Opauth.path')
    );
});
Router::connect('/accounts/validate/*', [
    'plugin' => 'CakeDC/Users',
    'controller' => 'SocialAccounts',
    'action' => 'validate'
]);
Router::connect('/profile/*', ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'profile']);
Router::connect('/login', ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'login']);
Router::connect('/logout', ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'logout']);