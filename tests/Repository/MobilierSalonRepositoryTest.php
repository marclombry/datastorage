<?php

namespace App\Tests\Repository;

use App\Repository\MobilierSalonRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class MobilierSalonRepositoryTest extends KernelTestCase
{
    private $mobilierSalonRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->mobilierSalonRepository = static::getContainer()->get(MobilierSalonRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $mobilierSalon = $this->mobilierSalonRepository->find(2);

        // Perform your assertions based on the repository results
        $this->isInstanceOfmobilierSalonRepository();
        $this->isNotEmptyAndIsArray($mobilierSalon);

    }

    private function isInstanceOfmobilierSalonRepository()
    {
        $this->isInstanceOf(MobilierSalonRepository::class, $this->mobilierSalonRepository);
    }

    private function isNotEmptyAndIsArray($mobilierSalon)
    {
        $this->assertNotEmpty($mobilierSalon);
        $this->assertIsArray($mobilierSalon);
    }


}
