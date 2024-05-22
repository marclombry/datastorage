<?php

namespace App\Tests\Repository;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProduitRepositoryTest extends KernelTestCase
{
    private $produitRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->produitRepository = static::getContainer()->get(ProduitRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $produit = $this->produitRepository->find(2);

        // Perform your assertions based on the repository results
        $this->isInstanceOfproduitRepository();
        $this->isNotEmptyAndIsArray($produit);

    }

    private function isInstanceOfproduitRepository()
    {
        $this->isInstanceOf(ProduitRepository::class, $this->produitRepository);
    }

    private function isNotEmptyAndIsArray($produit)
    {
        $this->assertNotEmpty($produit);
        $this->assertIsArray($produit);
    }


}
