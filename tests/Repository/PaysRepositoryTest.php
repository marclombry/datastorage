<?php

namespace App\Tests\Repository;

use App\Repository\PaysRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PaysRepositoryTest extends KernelTestCase
{
    private $paysRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->paysRepository = static::getContainer()->get(PaysRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $pays = $this->paysRepository->find(4);

        // Perform your assertions based on the repository results
        $this->isInstanceOfpaysRepository();
        $this->isNotEmptyAndIsArray($pays);

    }

    private function isInstanceOfpaysRepository()
    {
        $this->isInstanceOf(PaysRepository::class, $this->paysRepository);
    }

    private function isNotEmptyAndIsArray($pays)
    {
        $this->assertNotEmpty($pays);
        $this->assertIsArray($pays);
    }


}
