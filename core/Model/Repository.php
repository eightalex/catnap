<?php

namespace Core\Model;

use Core\DataBase\DataBase;

abstract class Repository
{

    /**
     * @return string
     */
    abstract function getTableName();

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $table_name = $this->getRepositoryTableName();
        $query = DataBase::getConnection()->query("
            SELECT * FROM `{$table_name}`
            WHERE id = {$id}
         ");
        $data =  $query->fetchObject();

        return $data;
    }

    /**
     * @return array
     */
    public function findAll()
    {
        $table_name = $this->getRepositoryTableName();
        $query = DataBase::getConnection()->query("
            SELECT * FROM `{$table_name}`
            WHERE 1 = 1
         ");
        $data =  $query->fetchAll(\PDO::FETCH_OBJ);

        return $data;
    }

    /**
     * @return string
     */
    protected function getRepositoryTableName()
    {
        $entity_name = strtolower(get_class($this));
        $entity_name = explode('\\', $entity_name);
        $entity_name = end($entity_name);

        return str_replace('repository', '', $entity_name);
    }
}