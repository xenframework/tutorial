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
 * All paths will be relative to project directory
 */
chdir(dirname(__DIR__));

require str_replace('/', DIRECTORY_SEPARATOR, 'vendor/xen/application/Application.php');

$app = new \xen\application\Application(\xen\application\Application::DEVELOPMENT);
$app->bootstrap();
$app->run();