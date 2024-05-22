<?php

namespace App\Tests\Repository;

use App\Repository\CourrierRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CourrierRepositoryTest extends KernelTestCase
{
    private $courrierRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->courrierRepository = static::getContainer()->get(CourrierRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $courrier = $this->courrierRepository->find(1);

        // Perform your assertions based on the repository results
        $this->isInstanceOfcourrierRepository();
        $this->isNotEmptyAndIsArray($courrier);

    }

    private function isInstanceOfcourrierRepository()
    {
        $this->isInstanceOf(CourrierRepository::class, $this->courrierRepository);
    }

    private function isNotEmptyAndIsArray($courrier)
    {
        $this->assertNotEmpty($courrier);
        $this->assertIsArray($courrier);
    }


}
