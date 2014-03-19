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

namespace controllers;

use xen\mvc\Controller;

class UsersController extends Controller
{
    private $_model;

    public function setModel($_model)
    {
        $this->_model = $_model;
    }

    public function init()
    {
    }

    public function indexAction()
    {
        $this->_layout->title           = 'Users Controller';
        $this->_layout->description     = 'Controller for users management';

        return $this->render();
    }

    public function addAction()
    {
        $this->_layout->title           = 'Add a new user';
        $this->_layout->description     = 'Insert a new user';

        return $this->render();
    }

    public function addDoAction()
    {
        $this->_model->add($this->_request->post('email'), $this->_request->post('password'));
        return $this->_forward('list');
    }

    public function removeAction()
    {
        $this->_model->remove($this->_params['id']);
        return $this->_redirect('users', 'list');
    }

    public function updateAction()
    {
        $user = $this->_model->getUserById($this->_params['id']);

        $this->_layout->title           = 'Update an user';
        $this->_layout->description     = 'Change user';

        $this->_view->user              = $user;

        return $this->render();
    }

    public function updateDoAction()
    {
        $this->_model->update(
            $this->_request->post('id'),
            $this->_request->post('email'),
            $this->_request->post('password'),
            $this->_request->post('role')
        );

        return $this->_redirect('users', 'list');
    }

    public function listAction()
    {
        $users = $this->_model->all();

        $this->_layout->title           = 'User List';
        $this->_layout->description     = 'Show all users';

        $this->_view->users = $users;

        return $this->render();
    }
}