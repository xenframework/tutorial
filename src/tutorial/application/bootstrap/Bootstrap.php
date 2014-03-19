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

use xen\application\Application;
use xen\application\bootstrap\BootstrapBase;
use xen\mvc\view\Phtml;

class Bootstrap extends BootstrapBase
{
//    protected function _initLayoutPath()
//    {
//        return str_replace('/', DIRECTORY_SEPARATOR, 'application/layouts/default');
//    }

    /*
     * This resource is not needed anymore so we do not store it in the Bootstrap container (return null)
     * In fact this is not a resource, only do actions at the beginning of the new request
     */
    protected function _initEnvironment()
    {
        if ($this->_appEnv == Application::DEVELOPMENT || $this->_appEnv == Application::TEST) {

            error_reporting(E_ALL | E_STRICT);
            ini_set('display_errors', 'on');

        } else if ($this->_appEnv == Application::PRODUCTION) {

            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
            ini_set('display_errors', 'off');
        }

        $timeZone = (string) $this->getResource('Config')->timezone;

        if (empty($timeZone)) {

            $timeZone = 'Europe/Madrid';
        }

        date_default_timezone_set($timeZone);

        return null;
    }

    protected function _initRole()
    {
        if ($user = $this->_resources['Session']->get('user')) {

            $role = $user->getRole();

        } else {

            $role = 'guest';
        }

        return $role;
    }

    /**
     *
     * @return Phtml
     *
     */
    protected function _initLayout()
    {
        $layout = $this->getResource('Layout');
        $config = $this->getResource('Config');

        $header = new Phtml($this->getResource('LayoutPath') . DIRECTORY_SEPARATOR . 'header.phtml');
        $header->charset = (string) $config->charset;

        if ($user = $this->_resources['Session']->get('user')) {

            $layout->loggedUser = $user->getEmail();

        } else {

            $layout->loggedUser = 'Login';
        }

        $partials   = array(

            'header' => $header,
            'footer' => new Phtml($this->getResource('LayoutPath') . DIRECTORY_SEPARATOR . 'footer.phtml'),
        );

        $layout->addPartials($partials);

        return $layout;
    }
}
