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

namespace views\helpers;

use xen\mvc\helpers\ViewHelper;

class UsersMenuHelper extends ViewHelper
{

    function __construct($params = array())
    {
        $router = $params['router'];

        $this->_html = '
            <ul class="list-inline">
                <li><a href="' . $router->toUrl('users', 'index') . '">Users</a></li>
                <li><a href="' . $router->toUrl('users', 'add') . '">Add new user</a></li>
                <li><a href="' . $router->toUrl('users', 'list') . '">Delete user</a></li>
                <li><a href="' . $router->toUrl('users', 'list') . '">Update user</a></li>
                <li><a href="' . $router->toUrl('users', 'list') . '">User list</a></li>
            </ul>
        ';
    }
}