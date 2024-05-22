<?php

namespace App\Repository;

use App\Traits\TablesAuthorizedTrait;
use Doctrine\DBAL\Connection;


class StatistiqueRepository
{
    use TablesAuthorizedTrait;
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function countCommercialActive()
    {

        $sql = "SELECT COUNT(*) as count FROM commercial c WHERE c.active = 1";
        $stmt = $this->connection->prepare($sql);

        $result = $stmt->executeQuery();

        // Fetch the first row as it contains the COUNT result.
        $row = $result->fetchAssociative();

        // Return the count value.
        return (int)$row['count'];
    }

}

