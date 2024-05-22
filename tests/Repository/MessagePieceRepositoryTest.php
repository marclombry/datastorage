<?php

namespace App\Tests\Repository;

use App\Repository\MessagePieceRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class MessagePieceRepositoryTest extends KernelTestCase
{
    private $messagePieceRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->messagePieceRepository = static::getContainer()->get(MessagePieceRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $messagePiece = $this->messagePieceRepository->find(2097);

        // Perform your assertions based on the repository results
        $this->isInstanceOfmessagePieceRepository();
        $this->isNotEmptyAndIsArray($messagePiece);

    }

    private function isInstanceOfmessagePieceRepository()
    {
        $this->isInstanceOf(MessagePieceRepository::class, $this->messagePieceRepository);
    }

    private function isNotEmptyAndIsArray($messagePiece)
    {
        $this->assertNotEmpty($messagePiece);
        $this->assertIsArray($messagePiece);
    }


}
