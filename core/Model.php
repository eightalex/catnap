<?php

namespace Core;

use Core\Exception\ModelException;

/**
 * Class Model
 * @package Core
 */
abstract class Model
{

    /**
     * @var \PDO|null
     */
    private $connection = null;

    /**
     *
     */
    const DATA_BASE = 'data.db';

    /**
     * Model constructor.
     */
    public function __construct()
    {
        if (!$this->connection)
        {
            $this->connection = new \PDO('sqlite:' . $this->getAbsolutePathToDatabase());
        }
    }

    /**
     * @return string
     */
    abstract protected function getTableName();

    /**
     * @param $id
     * @return mixed
     * @throws ModelException
     */
    public function find($id)
    {
        if ($this->connection->errorCode()) {
            throw new ModelException(ModelException::CONNECTION_ERROR);
        };

        $table =$this->getTableName();
        $query = $this->connection->query("
            SELECT * FROM `{$table}`
            WHERE id = {$id}
         ");
        $data =  $query->fetchObject();

        return $data;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function findAll()
    {
        if ($this->connection->errorCode()) {
            throw new ModelException(ModelException::CONNECTION_ERROR);
        };

        $table = $this->getTableName();
        $query = $this->connection->query("
            SELECT * FROM `{$table}`
            WHERE 1 = 1
         ");
        $data =  $query->fetchAll(\PDO::FETCH_OBJ);

        return $data;
    }

    /**
     * @return string
     */
    private function getAbsolutePathToDatabase()
    {
        return __DIR__ . '/' . self::DATA_BASE;
    }
}