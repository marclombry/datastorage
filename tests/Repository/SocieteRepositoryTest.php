<?php

namespace App\Tests\Repository;

use App\Repository\SocieteRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SocieteRepositoryTest extends KernelTestCase
{
    private $societeRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->societeRepository = static::getContainer()->get(SocieteRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $societe = $this->societeRepository->find(2);

        // Perform your assertions based on the repository results
        $this->isInstanceOfsocieteRepository();
        $this->isNotEmptyAndIsArray($societe);

    }

    private function isInstanceOfsocieteRepository()
    {
        $this->isInstanceOf(SocieteRepository::class, $this->societeRepository);
    }

    private function isNotEmptyAndIsArray($societe)
    {
        $this->assertNotEmpty($societe);
        $this->assertIsArray($societe);
    }


}
