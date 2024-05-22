<?php

namespace App\Tests\Repository;

use App\Repository\LieuRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class LieuRepositoryTest extends KernelTestCase
{
    private $lieuRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->lieuRepository = static::getContainer()->get(LieuRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $lieu = $this->lieuRepository->find(2);

        // Perform your assertions based on the repository results
        $this->isInstanceOflieuRepository();
        $this->isNotEmptyAndIsArray($lieu);

    }

    private function isInstanceOflieuRepository()
    {
        $this->isInstanceOf(LieuRepository::class, $this->lieuRepository);
    }

    private function isNotEmptyAndIsArray($lieu)
    {
        $this->assertNotEmpty($lieu);
        $this->assertIsArray($lieu);
    }


}
