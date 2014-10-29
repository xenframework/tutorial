<?php
/**
 * xenFramework (http://xenframework.com/)
 *
 * This file is part of the xenframework package.
 *
 * (c) Ismael Trascastro <itrascastro@xenframework.com>
 *
 * @link        http://github.com/xenframework for the canonical source repository
 * @copyright   Copyright (c) xenFramework. (http://xenframework.com)
 * @license     MIT License - http://en.wikipedia.org/wiki/MIT_License
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Param name is the string between the brackets
 *
 * A route must start with a slash
 *
 * Only the controller and the action are mandatory
 *
 * Constraints are optional. You can use RegEx
 *
 * if expires is set, then it will be cached [0 | empty ==> not cached]
 */
return array(
    'main_controllers_frontend_index_index' => array(
        'path'              => '/',
        'namespace'         => 'controllers\\frontend',
        'controller'        => 'index',
        'action'            => 'index',
        'cache'             => array(
            'expires'   => 0,
            'roles'     => array('guest'),
        ),
    ),
    'main_controllers_backend_users_index' => array(
        'path'              => '/users/',
        'namespace'         => 'controllers\\backend',
        'controller'        => 'users',
        'action'            => 'index',
        'allow'             => array('user', 'admin'),
    ),
    'main_controllers_backend_users_add' => array(
        'path'              => '/users/add/',
        'namespace'         => 'controllers\\backend',
        'controller'        => 'users',
        'action'            => 'add',
        'allow'             => array('admin'),
    ),
    'main_controllers_backend_users_addDo' => array(
        'path'              => '/users/addDo/',
        'namespace'         => 'controllers\\backend',
        'controller'        => 'users',
        'action'            => 'addDo',
        'allow'             => array('admin'),
    ),
    'main_controllers_backend_users_remove' => array(
        'path'              => '/users/remove/id/{id}/',
        'namespace'         => 'controllers\\backend',
        'controller'        => 'users',
        'action'            => 'remove',
        'constraints'       => array(
            'id'    => '\d+',
        ),
        'allow'             => array('admin'),
    ),
    'main_controllers_backend_users_update' => array(
        'path'              => '/users/update/id/{id}/',
        'namespace'         => 'controllers\\backend',
        'controller'        => 'users',
        'action'            => 'update',
        'constraints'       => array(
            'id'    => '\d+',
        ),
        'allow'             => array('admin'),
    ),
    'main_controllers_backend_users_updateDo' => array(
        'path'              => '/users/updateDo/',
        'namespace'         => 'controllers\\backend',
        'controller'        => 'users',
        'action'            => 'updateDo',
        'allow'             => array('admin'),
    ),
    'main_controllers_backend_users_list' => array(
        'path'              => '/users/list/',
        'namespace'         => 'controllers\\backend',
        'controller'        => 'users',
        'action'            => 'list',
        'allow'             => array('user', 'admin'),
        'expires'           => '60',
    ),
);
