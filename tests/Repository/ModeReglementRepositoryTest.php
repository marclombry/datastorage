<?php

namespace App\Tests\Repository;

use App\Repository\ModeReglementRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ModeReglementRepositoryTest extends KernelTestCase
{
    private $modeReglementRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->modeReglementRepository = static::getContainer()->get(ModeReglementRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $modeReglement = $this->modeReglementRepository->find(2);

        // Perform your assertions based on the repository results
        $this->isInstanceOfmodeReglementRepository();
        $this->isNotEmptyAndIsArray($modeReglement);

    }

    private function isInstanceOfmodeReglementRepository()
    {
        $this->isInstanceOf(ModeReglementRepository::class, $this->modeReglementRepository);
    }

    private function isNotEmptyAndIsArray($modeReglement)
    {
        $this->assertNotEmpty($modeReglement);
        $this->assertIsArray($modeReglement);
    }


}
