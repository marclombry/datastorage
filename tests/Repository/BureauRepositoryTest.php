<?php

namespace App\Tests\Repository;

use App\Repository\BureauRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BureauRepositoryTest extends KernelTestCase
{
    private $bureauRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->bureauRepository = static::getContainer()->get(BureauRepository::class);
    }


    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $bureau = $this->bureauRepository->find(1);

        // Perform your assertions based on the repository results
        $this->isInstanceOfbureauRepository();
        $this->isNotEmptyAndIsArray($bureau);

    }

    private function isInstanceOfBureauRepository()
    {
        $this->isInstanceOf(BureauRepository::class, $this->bureauRepository);
    }

    private function isNotEmptyAndIsArray($bureau)
    {
        $this->assertNotEmpty($bureau);
        $this->assertIsArray($bureau);
    }

}
