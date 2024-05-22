<?php

namespace App\Repository;

use App\Traits\TablesAuthorizedTrait;
use Doctrine\DBAL\Connection;


class BadgeRepository
{
    use TablesAuthorizedTrait;

    public function __construct(private Connection $secondConnection)
    {
    }

    public function findAll()
    {
        if(!$this->isAuthorized('badge')){
            return [];
        }
        $sql = "SELECT * FROM badge";
        $stmt = $this->secondConnection->prepare($sql);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }

    public function find($id)
    {
        if(!$this->isAuthorized('badge')){
            return [];
        }
        $sql = "SELECT * FROM badge WHERE id = :id";
        $stmt = $this->secondConnection->prepare($sql);
        $stmt->bindValue('id', $id);
        $result = $stmt->executeQuery();

        return $result->fetchAssociative();
    }

    /**
     * @param string $exposant
     * @return array|false
     * @throws \Doctrine\DBAL\Exception
     */
    public function FindAllBadgeByExposant(string $exposant): array|false
    {
        if(!$this->isAuthorized('badge')){
            return [];
        }
        $sql = "SELECT * FROM badge WHERE exposant = :exposant";
        $stmt = $this->secondConnection->prepare($sql);
        $stmt->bindValue('exposant', $exposant);
        $result = $stmt->executeQuery();

        return $result->fetchAssociative();
    }

    public function findBadgeBy(array $filters)
    {
        if(!$this->isAuthorized('badge')){
            return [];
        }

        $key = key($filters);
        $value = reset($filters);
        $sql = "SELECT * FROM badge WHERE $key = :$key";
        $stmt = $this->secondConnection->prepare($sql);
        $stmt->bindValue($key, $value);
        $result = $stmt->executeQuery();

        return $result->fetchAssociative();
    }

    public function findAllBadgeBy(array $filters)
    {
        if(!$this->isAuthorized('badge')){
            return [];
        }

        $key = key($filters);
        $value = reset($filters);
        $sql = "SELECT * FROM badge WHERE $key = :$key";
        $stmt = $this->secondConnection->prepare($sql);
        $stmt->bindValue($key, $value);
        $result = $stmt->executeQuery();

        return $result->fetchAllAssociative();
    }

    //***********  request for badge*******************//
    public function findAllPerson()
    {
        if(!$this->isAuthorized('badge')){
            return [];
        }

        $sql = "SELECT *, GROUP_CONCAT(email) AS emails
            FROM badge
            GROUP BY email";
        $stmt = $this->secondConnection->prepare($sql);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();

    }
    
    public function findAllVisitor()
    {
        if(!$this->isAuthorized('badge')){
            return [];
        }

        $sql = "SELECT *, GROUP_CONCAT(email) AS emails
        FROM badge
        where person = 'visiteur'
        GROUP BY email";
        $stmt = $this->secondConnection->prepare($sql);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }

    public function findAllExposant()
    {
        if(!$this->isAuthorized('badge')){
            return [];
        }

        $sql = "SELECT *, GROUP_CONCAT(email) AS emails
        FROM badge
        where person = 'exposant'
        GROUP BY email";
        $stmt = $this->secondConnection->prepare($sql);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }

    public function countAllPerson()
    {
        $sql = "SELECT GROUP_CONCAT(email) AS all_emails, COUNT(*) AS total_count
        FROM (
            SELECT email
            FROM badge
            GROUP BY email
        ) AS subquery";
        $stmt = $this->secondConnection->prepare($sql);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }

    public function countVisitor()
    {
        $sql = "SELECT GROUP_CONCAT(email) AS all_emails, COUNT(*) AS total_count
        FROM (
            SELECT email
            FROM badge
            WHERE person = 'visitor'
            GROUP BY email
        ) AS subquery";
        $stmt = $this->secondConnection->prepare($sql);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }

    public function countExposant()
    {
        $sql = "SELECT GROUP_CONCAT(email) AS all_emails, COUNT(*) AS total_count
        FROM (
            SELECT email
            FROM badge
            WHERE person = 'visitor'
            GROUP BY email
        ) AS subquery";
        $stmt = $this->secondConnection->prepare($sql);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }

}

