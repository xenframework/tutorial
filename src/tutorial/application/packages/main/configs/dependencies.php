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
 * IoC
 *
 * In this array you can put your own dependencies
 *
 * **********
 * Important! - Remember to create the properties and the setters methods in your classes to enable dependency injection
 * **********
 *
 * Each entry is a service with his dependencies declared in an array
 *
 * A service has to have one setter method for each dependency
 *
 * You can use default dependencies as: {Database_#dbName#} which are resolved in xen\BootstrapBase
 * The rest of services and dependencies must have their NAMESPACE as a part of their names
 *
 * array(
 *      'service1' => array(
 *          'dependencySetter1' => 'dependency1',
 *          'dependencySetter2' => 'dependency2',
 *          ...
 *          'dependencySetterN' => 'dependencyN',
 *      ),
 *      'service2' => array(
 *          'dependencySetter1' => 'dependency1',
 *          'dependencySetter2' => 'dependency2',
 *          ...
 *          'dependencySetterN' => 'dependencyN',
 *      ),
 *      ...
 *      'serviceN' => array(
 *          'dependencySetter1' => 'dependency1',
 *          'dependencySetter2' => 'dependency2',
 *          ...
 *          'dependencySetterN' => 'dependencyN',
 *      ),
 * )
 */
return array(
    'main\\models\\UsersModel'                => array(
        'db'        => 'Database_db2_pdo',
    ),
    'main\\controllers\\backend\\UsersController'      => array(
        'model'     => 'main\\models\\UsersModel',
    ),
    'main\\controllers\\frontend\\IndexController'      => array(
        'em'        => 'Database_db2_doctrine',
    ),
);