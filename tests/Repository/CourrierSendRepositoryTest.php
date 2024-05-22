<?php

namespace App\Tests\Repository;

use App\Repository\CourrierSendRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CourrierSendRepositoryTest extends KernelTestCase
{
    private $courrierSendRepository;


    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->courrierSend = static::getContainer()->get(CourrierSendRepository::class);
    }


    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $courrierSend = $this->courrierSend->find(1);

        // Perform your assertions based on the repository results
        $this->isInstanceOfcourrierSendlRepository();
        $this->isNotEmptyAndIsArray($courrierSend);

    }

    private function isInstanceOfcourrierSendlRepository()
    {
        $this->isInstanceOf(CourrierSendRepository::class, $this->courrierSendRepository);
    }

    private function isNotEmptyAndIsArray($courrierSend)
    {
        $this->assertNotEmpty($courrierSend);
        $this->assertIsArray($courrierSend);
    }


}
