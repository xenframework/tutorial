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

namespace com\xenframework\login\models;

use xen\config\Config;
use xen\db\Adapter;

class LoginModel
{
    /**
     * @var Adapter
     */
    private $_db;

    private $_config;

    public function __construct()
    {
    }

    public function setConfig(Config $_config)
    {
        $this->_config = $_config;
    }

    /**
     * setDb
     *
     * Description
     *
     * @param Adapter $_db
     */
    public function setDb(Adapter $_db)
    {
        $this->_db = $_db;
    }

    public function login($fieldValues)
    {
        $where = '';
        $first = true;

        foreach ($this->_config->package->matchFields as $fieldName)
        {
            if (!$first) $where .= ' AND ';
            else $first = false;

            $where .= $fieldName . ' = :' . $fieldName;
        }

        $sql = 'SELECT * FROM ' . $this->_config->package->table . ' WHERE ' . $where;
        $query = $this->_db->prepare($sql);

        foreach ($this->_config->package->matchFields as $fieldName)
        {
            $query->bindValue(':' . $fieldName, $fieldValues[$fieldName]);
        }

        $query->execute();

        if ($row = $query->fetch(Adapter::FETCH_ASSOC))
        {
            $args = array();

            foreach ($this->_config->package->entityFields as $field)
            {
                $args[] = $row[$field];
            }

            $ref = new \ReflectionClass($this->_config->package->entity);
            return $ref->newInstanceArgs($args);
        }

        return null;
    }
} 