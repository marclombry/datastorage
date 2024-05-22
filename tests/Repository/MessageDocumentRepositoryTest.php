<?php

namespace App\Tests\Repository;

use App\Repository\MessageDocumentRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class MessageDocumentRepositoryTest extends KernelTestCase
{
    private $messageDocumentRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->messageDocumentRepository = static::getContainer()->get(MessageDocumentRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $messageDocument = $this->messageDocumentRepository->find(7366);

        // Perform your assertions based on the repository results
        $this->isInstanceOfmessageDocumentRepository();
        $this->isNotEmptyAndIsArray($messageDocument);

    }

    private function isInstanceOfmessageDocumentRepository()
    {
        $this->isInstanceOf(MessageDocumentRepository::class, $this->messageDocumentRepository);
    }

    private function isNotEmptyAndIsArray($messageDocument)
    {
        $this->assertNotEmpty($messageDocument);
        $this->assertIsArray($messageDocument);
    }


}
