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

namespace com\xenframework\calculator\models;

class CalculatorModel
{
    private $_op1;
    private $_op2;
    private $_result;

    public function __construct($_op1=0, $_op2=0)
    {
        $this->_op1 = $_op1;
        $this->_op2 = $_op2;
        $this->_result = 0;
    }

    public function add()
    {
        $this->_result = $this->_op1 + $this->_op2;
    }

    public function subtract()
    {
        $this->_result = $this->_op1 - $this->_op2;
    }

    public function multiply()
    {
        $this->_result = $this->_op1 * $this->_op2;
    }

    public function divide()
    {
        $this->_result = (int) ($this->_op1 / $this->_op2);
    }

    public function getResult()
    {
        return $this->_result;
    }

    /**
     * @param mixed $op1
     */
    public function setOp1($op1)
    {
        $this->_op1 = $op1;
    }

    /**
     * @return mixed
     */
    public function getOp1()
    {
        return $this->_op1;
    }

    /**
     * @param mixed $op2
     */
    public function setOp2($op2)
    {
        $this->_op2 = $op2;
    }

    /**
     * @return mixed
     */
    public function getOp2()
    {
        return $this->_op2;
    }

}