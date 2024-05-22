<?php

namespace App\Repository;

use App\Traits\TablesAuthorizedTrait;
use Doctrine\DBAL\Connection;


class BureauRepository
{
    use TablesAuthorizedTrait;
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function findAll()
    {
        if(!$this->isAuthorized('bureau')){
            return [];
        }
        $sql = "SELECT * FROM bureau";
        $stmt = $this->connection->prepare($sql);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }

    public function find($id)
    {
        if(!$this->isAuthorized('bureau')){
            return [];
        }
        $sql = "SELECT * FROM bureau WHERE idbureau = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('id', $id);
        $result = $stmt->executeQuery();

        return $result->fetchAssociative();
    }

    public function findSocieteByBureau(int $id): array|bool
    {
        if(!$this->isAuthorized('bureau')){
            return [];
        }
        $sql = "SELECT * FROM bureau b LEFT JOIN societe s ON b.idsociete = s.idsociete WHERE idbureau=:id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('id', $id);
        $result = $stmt->executeQuery();

        return $result->fetchAllAssociative();
    }

    public function findByDenomination(int $id)
    {
        if(!$this->isAuthorized('bureau')){
            return [];
        }
        $sql = "SELECT * FROM bureau b WHERE iddenomination =:id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('id', $id);
        $result = $stmt->executeQuery();

        return $result->fetchAllAssociative();
    }

    public function count()
    {
        if (!$this->isAuthorized('bureau')) {
            return 0;
        }

        $sql = "SELECT COUNT(*) as count FROM bureau b";
        $stmt = $this->connection->prepare($sql);

        $result = $stmt->executeQuery();

        // Fetch the first row as it contains the COUNT result.
        $row = $result->fetchAssociative();

        // Return the count value.
        return (int)$row['count'];
    }
}

