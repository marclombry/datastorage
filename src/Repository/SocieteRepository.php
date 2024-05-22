<?php

namespace App\Repository;

use App\Traits\TablesAuthorizedTrait;
use Doctrine\DBAL\Connection;


class SocieteRepository
{
    use TablesAuthorizedTrait;
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function findAll()
    {
        if(!$this->isAuthorized('societe')){
            return [];
        }
        $sql = "SELECT * FROM societe";
        $stmt = $this->connection->prepare($sql);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }

    public function find($id)
    {
        if(!$this->isAuthorized('societe')){
            return [];
        }
        $sql = "SELECT * FROM societe WHERE idsociete = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('id', $id);
        $result = $stmt->executeQuery();

        return $result->fetchAssociative();
    }

    public function count()
    {
        if (!$this->isAuthorized('societe')) {
            return 0;
        }

        $sql = "SELECT COUNT(*) as count FROM societe s";
        $stmt = $this->connection->prepare($sql);

        $result = $stmt->executeQuery();

        // Fetch the first row as it contains the COUNT result.
        $row = $result->fetchAssociative();

        // Return the count value.
        return (int)$row['count'];
    }

    public function findSalonById(int $id)
    {
        if(!$this->isAuthorized('societe')){
            return [];
        }
        $sql = "SELECT *  FROM societe c
            LEFT JOIN exposant_societe es ON c.idsociete = es.idsociete
            LEFT JOIN salon sa ON es.idsalon = sa.idsalon
            WHERE sa.idsalon = :idsalon
        ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('idsalon', $id);
        $result = $stmt->executeQuery();

        return $result->fetchAllAssociative();

    }
}

