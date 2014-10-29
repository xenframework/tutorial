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

namespace main\views\helpers;

use xen\mvc\helpers\ViewHelper;

class UsersMenuHelper extends ViewHelper
{
    protected function _html()
    {
        $this->_html = '
            <ul class="list-inline">
                <li><a href="' . $this->_router->toUrl('main_controllers_backend_users_index') . '">Users</a></li>
                <li><a href="' . $this->_router->toUrl('main_controllers_backend_users_add') . '">Add new user</a></li>
                <li><a href="' . $this->_router->toUrl('main_controllers_backend_users_list') . '">Delete user</a></li>
                <li><a href="' . $this->_router->toUrl('main_controllers_backend_users_list') . '">Update user</a></li>
                <li><a href="' . $this->_router->toUrl('main_controllers_backend_users_list') . '">User list</a></li>
            </ul>
        ';
    }
}