<?php

namespace App\Tests\Repository;

use App\Repository\ListeRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ListeRepositoryTest extends KernelTestCase
{
    private $listeRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->listeRepository = static::getContainer()->get(ListeRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $liste = $this->listeRepository->find(2);

        // Perform your assertions based on the repository results
        $this->isInstanceOflisteRepository();
        $this->isNotEmptyAndIsArray($liste);

    }

    private function isInstanceOflisteRepository()
    {
        $this->isInstanceOf(ListeRepository::class, $this->listeRepository);
    }

    private function isNotEmptyAndIsArray($liste)
    {
        $this->assertNotEmpty($liste);
        $this->assertIsArray($liste);
    }


}
