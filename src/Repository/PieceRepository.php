<?php

namespace App\Repository;

use App\Traits\TablesAuthorizedTrait;
use Doctrine\DBAL\Connection;


class PieceRepository
{
    use TablesAuthorizedTrait;
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function findAll()
    {
        if(!$this->isAuthorized('piece')){
            return [];
        }
        $sql = "SELECT * FROM piece";
        $stmt = $this->connection->prepare($sql);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }

    public function find($id)
    {
        if(!$this->isAuthorized('piece')){
            return [];
        }
        $sql = "SELECT * FROM piece WHERE idpiece = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('id', $id);
        $result = $stmt->executeQuery();

        return $result->fetchAssociative();
    }
}

