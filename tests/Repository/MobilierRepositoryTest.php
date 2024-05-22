<?php

namespace App\Tests\Repository;

use App\Repository\MobilierRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class MobilierRepositoryTest extends KernelTestCase
{
    private $mobilierRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->mobilierRepository = static::getContainer()->get(MobilierRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $mobilier = $this->mobilierRepository->find(1);

        // Perform your assertions based on the repository results
        $this->isInstanceOfmobilierRepository();
        $this->isNotEmptyAndIsArray($mobilier);

    }

    private function isInstanceOfmobilierRepository()
    {
        $this->isInstanceOf(MobilierRepository::class, $this->mobilierRepository);
    }

    private function isNotEmptyAndIsArray($mobilier)
    {
        $this->assertNotEmpty($mobilier);
        $this->assertIsArray($mobilier);
    }


}
