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

namespace com\xenframework\calculator\controllers\frontend;

use xen\mvc\Controller;

class CalculatorController extends Controller
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
        $this->_layout->title           = 'Calculator - 4 basic operations';
        $this->_layout->description     = 'Calculator Index';

        $this->render();
    }

    public function addAction()
    {
        $this->_layout->title           = 'Add Form';
        $this->_layout->description     = 'Add 2 numbers';

        $this->render();
    }

    public function addDoAction()
    {
        $this->_model->setOp1($this->_request->post('op1'));
        $this->_model->setOp2($this->_request->post('op2'));
        $this->_model->add();

        $this->_layout->title           = 'Add Result';
        $this->_layout->description     = 'Add Result';
        $this->_view->op1               = $this->_model->getOp1();
        $this->_view->op2               = $this->_model->getOp2();
        $this->_view->result            = $this->_model->getResult();

        $this->render();
    }

    public function subtractAction()
    {
        $this->_layout->title           = 'Subtract Form';
        $this->_layout->description     = 'Subtract 2 numbers';

        $this->render();
    }

    public function subtractDoAction()
    {
        $this->_model->setOp1($this->_request->post('op1'));
        $this->_model->setOp2($this->_request->post('op2'));
        $this->_model->subtract();

        $this->_layout->title           = 'Subtract Result';
        $this->_layout->description     = 'Subtract Result';
        $this->_view->op1               = $this->_model->getOp1();
        $this->_view->op2               = $this->_model->getOp2();
        $this->_view->result            = $this->_model->getResult();

        $this->render();
    }
} 