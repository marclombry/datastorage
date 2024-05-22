<?php

namespace App\Repository;

use App\Traits\TablesAuthorizedTrait;
use Doctrine\DBAL\Connection;


class GeneralRepository
{

    use TablesAuthorizedTrait;

    /**
     * @param Connection $connection
     */
    public function __construct(private Connection $connection)
    {
    }

    /**
     * @param string $table
     * @return array
     * @throws \Doctrine\DBAL\Exception
     */
    public function findAllByTableName(string $table) : array
    {
        if(!$this->isAuthorized($table))
        {
            return [];
        }
        $sql = "SELECT * FROM $table";
        $stmt = $this->connection->prepare($sql);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();

    }

    /**
     * @param string $table
     * @param array $fieldName
     * @return array
     * @throws \Doctrine\DBAL\Exception
     */
    public function find(string $table, array $fieldName) :array
    {
        if(!$this->isAuthorized($table)) {
            return [];
        }
        $sql = "SELECT * FROM $table WHERE $fieldName[0] = :$fieldName[0]";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue($fieldName[0], $fieldName[1]);
        $result = $stmt->executeQuery();

        return $result->fetchAssociative();
    }

}

