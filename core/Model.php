<?php

namespace Core;

use Core\Exception\ModelException;

/**
 * Class Model
 * @package Core
 */
class Model
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
     * @return array
     * @throws \Exception
     */
    public function findAll()
    {
        if ($this->connection->errorCode()) {
            throw new ModelException(ModelException::CONNECTION_ERROR);
        };

        $table = $this->getEntityName();
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
    private function getEntityName()
    {
        $entity_name = strtolower(get_class($this));
        $entity_name = explode('\\', $entity_name);

        return end($entity_name);
    }

    /**
     * @return string
     */
    private function getAbsolutePathToDatabase()
    {
        return __DIR__ . '/' . self::DATA_BASE;
    }
}