<?php

namespace App\Tests\Repository;

use App\Repository\CommercialRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CommercialRepositoryTest extends KernelTestCase
{
    private $commercialRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->commercialRepository = static::getContainer()->get(CommercialRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $commercial = $this->commercialRepository->find(1);

        // Perform your assertions based on the repository results
        $this->isInstanceOfcommercialRepository();
        $this->isNotEmptyAndIsArray($commercial);

    }

    private function isInstanceOfcommercialRepository()
    {
        $this->isInstanceOf(CommercialRepository::class, $this->commercialRepository);
    }

    private function isNotEmptyAndIsArray($commercial)
    {
        $this->assertNotEmpty($commercial);
        $this->assertIsArray($commercial);
    }


}
