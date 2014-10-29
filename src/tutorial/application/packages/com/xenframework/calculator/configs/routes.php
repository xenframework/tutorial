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
    'com_xenframework_calculator_controllers_frontend_calculator_index' => array(
        'path'              => '/calculator/',
        'namespace'         => 'controllers\\frontend',
        'controller'        => 'calculator',
        'action'            => 'index',
        'allow'             => array('guest', 'user', 'admin'),
        'expires'           => 10,
    ),
    'com_xenframework_calculator_controllers_frontend_calculator_add' => array(
        'path'              => '/calculator/add/',
        'namespace'         => 'controllers\\frontend',
        'controller'        => 'calculator',
        'action'            => 'add',
        'allow'             => array('user', 'admin'),
        'expires'           => 60,
    ),
    'com_xenframework_calculator_controllers_frontend_calculator_addDo' => array(
        'path'              => '/calculator/addDo/',
        'namespace'         => 'controllers\\frontend',
        'controller'        => 'calculator',
        'action'            => 'addDo',
        'allow'             => array('user', 'admin'),
    ),
    'com_xenframework_calculator_controllers_frontend_calculator_subtract' => array(
        'path'              => '/calculator/subtract/',
        'namespace'         => 'controllers\\frontend',
        'controller'        => 'calculator',
        'action'            => 'subtract',
        'allow'             => array('admin'),
    ),
    'com_xenframework_calculator_controllers_frontend_calculator_subtractDo' => array(
        'path'              => '/calculator/subtractDo/',
        'namespace'         => 'controllers\\frontend',
        'controller'        => 'calculator',
        'action'            => 'subtractDo',
        'allow'             => array('admin'),
    ),
);
