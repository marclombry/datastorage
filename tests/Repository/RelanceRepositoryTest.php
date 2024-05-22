<?php

namespace App\Tests\Repository;

use App\Repository\RelanceRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RelanceRepositoryTest extends KernelTestCase
{
    private $relanceRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->relanceRepository = static::getContainer()->get(RelanceRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $relance = $this->relanceRepository->find(21);

        // Perform your assertions based on the repository results
        $this->isInstanceOfrelanceRepository();
        $this->isNotEmptyAndIsArray($relance);

    }

    private function isInstanceOfrelanceRepository()
    {
        $this->isInstanceOf(RelanceRepository::class, $this->relanceRepository);
    }

    private function isNotEmptyAndIsArray($relance)
    {
        $this->assertNotEmpty($relance);
        $this->assertIsArray($relance);
    }


}
