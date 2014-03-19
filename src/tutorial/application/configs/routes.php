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
 * Constraints are optional. You can use RegEx
 */
return array(
    '/' => array(
        'controller'        => 'index',
        'action'            => 'index',
        'allow'             => array('guest', 'user', 'admin'),
    ),
    '/calculator/' => array(
        'controller'        => 'calculator',
        'action'            => 'index',
        'allow'             => array('guest', 'user', 'admin'),
    ),
    '/calculator/add/' => array(
        'controller'        => 'calculator',
        'action'            => 'add',
        'allow'             => array('user', 'admin'),
    ),
    '/calculator/addDo/' => array(
        'controller'        => 'calculator',
        'action'            => 'addDo',
        'allow'             => array('user', 'admin'),
    ),
    '/calculator/subtract/' => array(
        'controller'        => 'calculator',
        'action'            => 'subtract',
        'allow'             => array('admin'),
    ),
    '/calculator/subtractDo/' => array(
        'controller'        => 'calculator',
        'action'            => 'subtractDo',
        'allow'             => array('admin'),
    ),
    '/users/' => array(
        'controller'        => 'users',
        'action'            => 'index',
        'allow'             => array('user', 'admin'),
    ),
    '/users/add/' => array(
        'controller'        => 'users',
        'action'            => 'add',
        'allow'             => array('admin'),
    ),
    '/users/addDo/' => array(
        'controller'        => 'users',
        'action'            => 'addDo',
        'allow'             => array('admin'),
    ),
    '/users/remove/id/{id}/' => array(
        'controller'        => 'users',
        'action'            => 'remove',
        'constraints'       => array(
            'id'    => '\d+',
        ),
        'allow'             => array('admin'),
    ),
    '/users/update/id/{id}/' => array(
        'controller'        => 'users',
        'action'            => 'update',
        'constraints'       => array(
            'id'    => '\d+',
        ),
        'allow'             => array('admin'),
    ),
    '/users/updateDo/' => array(
        'controller'        => 'users',
        'action'            => 'updateDo',
        'allow'             => array('admin'),
    ),
    '/users/list/' => array(
        'controller'        => 'users',
        'action'            => 'list',
        'allow'             => array('user', 'admin'),
    ),
    '/login/' => array(
        'controller'        => 'login',
        'action'            => 'index',
        'allow'             => array('guest', 'user', 'admin'),
    ),
    '/login/doLogin/' => array(
        'controller'        => 'login',
        'action'            => 'doLogin',
        'allow'             => array('guest', 'user', 'admin'),
    ),
);
