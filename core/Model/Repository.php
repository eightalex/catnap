<?php

namespace Core\Model;


/**
 * Class Repository
 * @package Core\Model
 */
abstract class Repository
{

    /**
     * @return string
     */
    abstract function getTableName();

    /**
     * @param $id
     * @return \RedBeanPHP\OODBBean
     */
    public function find($id)
    {
        return \R::load($this->getTableName(), $id);
    }

    /**
     * @return \RedBeanPHP\OODBBean[]
     */
    public function findAll()
    {
        return \R::findAll($this->getTableName());
    }

    /**
     * @param Entity $entity
     * @return int|string
     */
    public function flush(Entity $entity)
    {
        $model = \R::dispense($this->getTableName());
        foreach ($entity as $key => $value)
        {
            $model->$key = $value;
        }

        return \R::store($model);
    }
}