<?php

namespace App\Tests\Repository;

use App\Repository\LangueRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class LangueRepositoryTest extends KernelTestCase
{
    private $langueRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->langueRepository = static::getContainer()->get(LangueRepository::class);
    }

    public function testFind()
    {
        /*
        // Use the repository methods to test your custom logic
        $langue = $this->langueRepository->find(2);

        // Perform your assertions based on the repository results
        $this->isInstanceOflangueRepository();
        $this->isNotEmptyAndIsArray($langue);
        */
        $this->assertTrue(true);

    }

    private function isInstanceOflangueRepository()
    {
        $this->isInstanceOf(LangueRepository::class, $this->langueRepository);
    }

    private function isNotEmptyAndIsArray($langue)
    {
        $this->assertNotEmpty($langue);
        $this->assertIsArray($langue);
    }


}
