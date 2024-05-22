<?php

namespace App\Tests\Repository;

use App\Repository\MessageRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class MessageRepositoryTest extends KernelTestCase
{
    private $messageRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->messageRepository = static::getContainer()->get(MessageRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $message = $this->messageRepository->find(2);

        // Perform your assertions based on the repository results
        $this->isInstanceOfmessageRepository();
        $this->isNotEmptyAndIsArray($message);

    }

    private function isInstanceOfmessageRepository()
    {
        $this->isInstanceOf(MessageRepository::class, $this->messageRepository);
    }

    private function isNotEmptyAndIsArray($message)
    {
        $this->assertNotEmpty($message);
        $this->assertIsArray($message);
    }


}
