<?php

namespace App\Repository;

use App\Traits\TablesAuthorizedTrait;
use Doctrine\DBAL\Connection;


class TvaRepository
{
    use TablesAuthorizedTrait;
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function findAll()
    {
        if(!$this->isAuthorized('tva')){
            return [];
        }
        $sql = "SELECT * FROM tva";
        $stmt = $this->connection->prepare($sql);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }

    public function find($id)
    {
        if(!$this->isAuthorized('tva')){
            return [];
        }
        $sql = "SELECT * FROM tva WHERE idtva = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('id', $id);
        $result = $stmt->executeQuery();

        return $result->fetchAssociative();
    }
}

