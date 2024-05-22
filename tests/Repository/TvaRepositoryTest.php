<?php

namespace App\Tests\Repository;

use App\Repository\TvaRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class TvaRepositoryTest extends KernelTestCase
{
    private $tvaRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->tvaRepository = static::getContainer()->get(TvaRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $tva = $this->tvaRepository->find(2);

        // Perform your assertions based on the repository results
        $this->isInstanceOftvaRepository();
        $this->isNotEmptyAndIsArray($tva);

    }

    private function isInstanceOftvaRepository()
    {
        $this->isInstanceOf(TvaRepository::class, $this->tvaRepository);
    }

    private function isNotEmptyAndIsArray($tva)
    {
        $this->assertNotEmpty($tva);
        $this->assertIsArray($tva);
    }


}
