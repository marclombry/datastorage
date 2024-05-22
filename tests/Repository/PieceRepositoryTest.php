<?php

namespace App\Tests\Repository;

use App\Repository\PieceRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PieceRepositoryTest extends KernelTestCase
{
    private $pieceRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->pieceRepository = static::getContainer()->get(PieceRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $piece = $this->pieceRepository->find(29);

        // Perform your assertions based on the repository results
        $this->isInstanceOfpieceRepository();
        $this->isNotEmptyAndIsArray($piece);

    }

    private function isInstanceOfpieceRepository()
    {
        $this->isInstanceOf(PieceRepository::class, $this->pieceRepository);
    }

    private function isNotEmptyAndIsArray($piece)
    {
        $this->assertNotEmpty($piece);
        $this->assertIsArray($piece);
    }


}
