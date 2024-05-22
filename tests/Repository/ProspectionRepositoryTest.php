<?php

namespace App\Tests\Repository;

use App\Repository\ProspectionRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProspectionRepositoryTest extends KernelTestCase
{
    private $prospectionRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->prospectionRepository = static::getContainer()->get(ProspectionRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $prospection = $this->prospectionRepository->find(2);

        // Perform your assertions based on the repository results
        $this->isInstanceOfprospectionRepository();
        $this->isNotEmptyAndIsArray($prospection);

    }

    private function isInstanceOfprospectionRepository()
    {
        $this->isInstanceOf(ProspectionRepository::class, $this->prospectionRepository);
    }

    private function isNotEmptyAndIsArray($prospection)
    {
        $this->assertNotEmpty($prospection);
        $this->assertIsArray($prospection);
    }


}
