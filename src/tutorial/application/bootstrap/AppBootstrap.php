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

namespace bootstrap;


use xen\kernel\Application;
use xen\kernel\bootstrap\BootstrapBase;
use xen\mvc\view\Phtml;

class AppBootstrap extends BootstrapBase
{
    protected function _initEnvironment()
    {
        if ($this->_container->getResource('AppStage') == Application::DEVELOPMENT ||
            $this->_container->getResource('AppStage') == Application::TEST
        ) {
            error_reporting(E_ALL | E_STRICT);
            ini_set('display_errors', 'on');

        } else if ($this->_container->getResource('AppStage') == Application::PRODUCTION) {

            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
            ini_set('display_errors', 'off');
        }

        $timeZone = (string) $this->_container->getResource('ApplicationConfig')->timezone;

        if (empty($timeZone)) {

            $timeZone = 'Europe/Madrid';
        }

        date_default_timezone_set($timeZone);

        return null;
    }

    protected function _initRole()
    {
        return ($this->_container->getResource('Session')->exists('user')) ?
            $this->_container->getResource('Session')->get('user')->getRole() : 'guest';
    }

    /**
     *
     * @return Phtml
     *
     */
    protected function _initLayout()
    {
        $layout = $this->_container->getResource('Layout');
        $config = $this->_container->getResource('ApplicationConfig');

        $header = new Phtml($this->_container->getResource('LayoutPath') . DIRECTORY_SEPARATOR . 'header.phtml');
        $header->charset = (string) $config->charset;

        $header->loggedUser = ($this->_container->getResource('Session')->exists('user')) ?
            $this->_container->getResource('Session')->get('user')->getEmail() : 'Login';

        $partials   = array(

            'header' => $header,
            'footer' => new Phtml($this->_container->getResource('LayoutPath') . DIRECTORY_SEPARATOR . 'footer.phtml'),
        );

        $layout->addPartials($partials);

        return $layout;
    }
}
