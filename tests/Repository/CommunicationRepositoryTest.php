<?php

namespace App\Tests\Repository;

use App\Repository\CommunicationRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CommunicationRepositoryTest extends KernelTestCase
{
    private $communicationRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->communicationRepository = static::getContainer()->get(CommunicationRepository::class);
    }


    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $communication = $this->communicationRepository->find(2);

        // Perform your assertions based on the repository results
        $this->isInstanceOfcommunicationRepository();
        $this->isNotEmptyAndIsArray($communication);
    }

    private function isInstanceOfcommunicationRepository()
    {
        $this->isInstanceOf(CommunicationRepository::class, $this->communicationRepository);
    }

    private function isNotEmptyAndIsArray($communication)
    {
        $this->assertNotEmpty($communication);
        $this->assertIsArray($communication);
    }


}
