<?php

namespace App\Tests\Repository;

use App\Repository\StatistiqueRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class StatistiqueRepositoryTest extends KernelTestCase
{
    private $statistiqueRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->statistiqueRepository = static::getContainer()->get(StatistiqueRepository::class);
    }

    public function testCountCommercialActive()
    {
        // Use the repository methods to test your custom logic
        $statistique = $this->statistiqueRepository->countCommercialActive();

        // Perform your assertions based on the repository results
        $this->isInstanceOfStatistiqueRepository();
        //$this->isNotEmptyAndIsArray($statistique);
        $this->assertIsInt($statistique);

    }

    private function isInstanceOfStatistiqueRepository()
    {
        $this->isInstanceOf(StatistiqueRepository::class, $this->statistiqueRepository);
    }

    private function isNotEmptyAndIsArray($statistique)
    {
        $this->assertNotEmpty($statistique);
        $this->assertIsArray($statistique);
    }


}
