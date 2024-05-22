<?php

namespace App\Repository;

use App\Traits\TablesAuthorizedTrait;
use Doctrine\DBAL\Connection;


class CommunicationRepository
{
    use TablesAuthorizedTrait;
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function findAll()
    {
        if(!$this->isAuthorized('communication')){
            return [];
        }
        $sql = "SELECT * FROM communication";
        $stmt = $this->connection->prepare($sql);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }

    public function find($id)
    {
        if(!$this->isAuthorized('communication')){
            return [];
        }
        $sql = "SELECT * FROM communication WHERE idcommunication = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('id', $id);
        $result = $stmt->executeQuery();

        return $result->fetchAssociative();
    }

    public function getSociete(int $id)
    {
        if(!$this->isAuthorized('communication')){
            return [];
        }
        $sql = "SELECT * FROM communication WHERE idsociete = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('id', $id);
        $result = $stmt->executeQuery();

        return $result->fetchAllAssociative();
    }

    public function getSalon(int $id)
    {
        if(!$this->isAuthorized('communication')){
            return [];
        }
        $sql = "SELECT * FROM communication WHERE idsalon = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('id', $id);
        $result = $stmt->executeQuery();

        return $result->fetchAllAssociative();
    }

    public function getSocieteAndSalon(int $idSociete, int $idSalon)
    {
        if(!$this->isAuthorized('communication')){
            return [];
        }
        $sql = "SELECT * FROM communication 
         WHERE idsociete = :idSociete
         AND idsalon = :idSalon
         ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('idSociete', $idSociete);
        $stmt->bindValue('idSalon', $idSalon);
        $result = $stmt->executeQuery();

        return $result->fetchAllAssociative();
    }
}

