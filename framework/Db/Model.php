<?php

namespace LaraCore\Framework\Db;

use LaraCore\Framework\Db\Connection;
use LaraCore\Framework\Db\QueryBuilder;
use LaraCore\Framework\Configuration;

abstract class Model
{
  protected $db;
  public $errors = [];

  public function __construct()
  {
    $this->db = new QueryBuilder(Connection::make(Configuration::get('database')));
  }

  /**
   * get all data from database
   */
  public function all($tableName)
  {
    $model = $this->getClassName();
    return $this->db->selectAll($tableName, $model);
  }

  /**
   * get data from database where ids in array
   */
  public function findWhereIn($tableName, $column, $values)
  {
    return $this->db->findWhereIn($tableName, $column, $values);
  }

  public function prepare($sql)
  {
    return $this->db->prepare($sql);
  }

  /**
   * get inherited model class name
   */
  public function getClassName()
  {
    $model = new \ReflectionClass($this);
    return $model->getShortName();
  }
}