<?php

namespace App\Tests\Repository;

use App\Repository\DepartementRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DepartementRepositoryTest extends KernelTestCase
{
    private $departementRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->departementRepository = static::getContainer()->get(DepartementRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $departement = $this->departementRepository->find(1);

        // Perform your assertions based on the repository results
        $this->isInstanceOfdepartementRepository();
        $this->isNotEmptyAndIsArray($departement);

    }

    private function isInstanceOfdepartementRepository()
    {
        $this->isInstanceOf(DepartementRepository::class, $this->departementRepository);
    }

    private function isNotEmptyAndIsArray($departement)
    {
        $this->assertNotEmpty($departement);
        $this->assertIsArray($departement);
    }


}
