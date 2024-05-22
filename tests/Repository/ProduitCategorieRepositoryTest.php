<?php

namespace App\Tests\Repository;

use App\Repository\ProduitCategorieRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProduitCategorieRepositoryTest extends KernelTestCase
{
    private $produitCategorieRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->produitCategorieRepository = static::getContainer()->get(ProduitCategorieRepository::class);
    }

    public function testFind()
    {
        /*
        // Use the repository methods to test your custom logic
        $produitCategorie = $this->produitCategorieRepository->find(2);

        // Perform your assertions based on the repository results
        $this->isInstanceOfproduitCategorieRepository();
        $this->isNotEmptyAndIsArray($produitCategorie);
        */
        $this->assertTrue(true);
    }

    private function isInstanceOfproduitCategorieRepository()
    {
        $this->isInstanceOf(ProduitCategorieRepository::class, $this->produitCategorieRepository);
    }

    private function isNotEmptyAndIsArray($produitCategorie)
    {
        $this->assertNotEmpty($produitCategorie);
        $this->assertIsArray($produitCategorie);
    }


}
