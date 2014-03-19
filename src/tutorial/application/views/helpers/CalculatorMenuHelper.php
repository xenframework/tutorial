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

class CalculatorMenuHelper extends ViewHelper
{
    public function __construct($params=array())
    {
        $router = $params['router'];

        $this->_html = '
            <ul class="list-inline">
                <li><a href="' . $router->toUrl('calculator', 'add') . '">Add</a></li>
                <li><a href="' . $router->toUrl('calculator', 'subtract') . '">Subtract</a></li>
                <li><a href="' . $router->toUrl('calculator', 'multiply') . '">Multiply</a></li>
                <li><a href="' . $router->toUrl('calculator', 'divide') . '">Divide</a></li>
            </ul>
        ';
    }
} 