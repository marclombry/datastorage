<?php

namespace App\Repository;

use App\Traits\TablesAuthorizedTrait;
use Doctrine\DBAL\Connection;


class MessageRepository
{
    use TablesAuthorizedTrait;
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function findAll()
    {
        if(!$this->isAuthorized('message')){
            return [];
        }
        $sql = "SELECT * FROM message";
        $stmt = $this->connection->prepare($sql);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }

    public function find($id)
    {
        if(!$this->isAuthorized('message')){
            return [];
        }
        $sql = "SELECT * FROM message WHERE idmessage = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('id', $id);
        $result = $stmt->executeQuery();

        return $result->fetchAssociative();
    }

    public function count()
    {
        if (!$this->isAuthorized('message')) {
            return 0;
        }

        $sql = "SELECT COUNT(*) as count FROM message m";
        $stmt = $this->connection->prepare($sql);

        $result = $stmt->executeQuery();

        // Fetch the first row as it contains the COUNT result.
        $row = $result->fetchAssociative();

        // Return the count value.
        return (int)$row['count'];
    }
}

