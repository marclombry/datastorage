<?php

namespace App\Repository;

use App\Traits\TablesAuthorizedTrait;
use Doctrine\DBAL\Connection;


class MobilierRepository
{
    use TablesAuthorizedTrait;
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function findAll()
    {
        if(!$this->isAuthorized('mobilier')){
            return [];
        }
        $sql = "SELECT * FROM mobilier";
        $stmt = $this->connection->prepare($sql);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }

    public function find($id)
    {
        if(!$this->isAuthorized('mobilier')){
            return [];
        }
        $sql = "SELECT * FROM mobilier WHERE idmobilier = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('id', $id);
        $result = $stmt->executeQuery();

        return $result->fetchAssociative();
    }

    public function findBySociete(int $id)
    {
        if(!$this->isAuthorized('mobilier')){
            return [];
        }
        $sql = "SELECT * FROM mobilier WHERE idsociete=:id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('id', $id);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }

    public function findBySalon(int $id)
    {
        if(!$this->isAuthorized('mobilier')){
            return [];
        }
        $sql = "SELECT * FROM mobilier WHERE idsalon=:id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('id', $id);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }

    public function findBySocieteAndSalon(int $idSociete , int $idSalon)
    {
        if(!$this->isAuthorized('mobilier')){
            return [];
        }
        $sql = "SELECT * FROM mobilier WHERE idsociete=:idSociete AND idsalon=:idSalon";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('idSociete', $idSociete);
        $stmt->bindValue('idSalon', $idSalon);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }

    public function findMobilierPerSocieteAndSalon()
    {
        if(!$this->isAuthorized('mobilier')){
            return [];
        }
        $sql = "SELECT * FROM mobilier m
        LEFT JOIN societe so ON m.idsociete = so.idsociete
        LEFT JOIN salon s ON m.idsalon = s.idsalon
        
        ";
        $stmt = $this->connection->prepare($sql);

        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }
}

