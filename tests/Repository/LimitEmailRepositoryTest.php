<?php

namespace App\Tests\Repository;

use App\Repository\LimitEmailRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class LimitEmailRepositoryTest extends KernelTestCase
{
    private $limitEmailRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->limitEmailRepository = static::getContainer()->get(LimitEmailRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $limitEmail = $this->limitEmailRepository->find(0);

        // Perform your assertions based on the repository results
        $this->isInstanceOflimitEmailRepository();
        $this->isNotEmptyAndIsArray($limitEmail);

    }

    private function isInstanceOflimitEmailRepository()
    {
        $this->isInstanceOf(LimitEmailRepository::class, $this->limitEmailRepository);
    }

    private function isNotEmptyAndIsArray($limitEmail)
    {
        $this->assertNotEmpty($limitEmail);
        $this->assertIsArray($limitEmail);
    }


}
