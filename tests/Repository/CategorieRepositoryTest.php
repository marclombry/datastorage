<?php

namespace App\Tests\Repository;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CategorieRepositoryTest extends KernelTestCase
{
    private $categorieRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->categorieRepository = static::getContainer()->get(CategorieRepository::class);
    }


    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $categorie = $this->categorieRepository->find(1);

        // Perform your assertions based on the repository results
        $this->isInstanceOfcategorieRepository();
        $this->isNotEmptyAndIsArray($categorie);

    }

    private function isInstanceOfcategorieRepository()
    {
        $this->isInstanceOf(CategorieRepository::class, $this->categorieRepository);
    }

    private function isNotEmptyAndIsArray($categorie)
    {
        $this->assertNotEmpty($categorie);
        $this->assertIsArray($categorie);
    }

}
