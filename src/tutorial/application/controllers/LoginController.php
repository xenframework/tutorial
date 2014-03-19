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

class LoginController extends Controller
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
        $this->_layout->title           = 'Login Form';
        $this->_layout->description     = 'Introduce your credentials';

        $this->render();
    }

    public function doLoginAction()
    {
        $user = $this->_model->login($this->_request->post('email'), $this->_request->post('password'));

        if ($user != null) {

            $this->_session->set('user', $user);

            $this->_layout->title       = 'Login success';
            $this->_layout->description = 'Restricted Area';
            $this->_view->msg           = 'Success';

            $this->render();

        } else {

            $this->_redirect('login', 'index');

        }
    }

} 