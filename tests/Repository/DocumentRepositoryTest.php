<?php

namespace App\Tests\Repository;

use App\Repository\DocumentRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DocumentRepositoryTest extends KernelTestCase
{
    private $documentRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->documentRepository = static::getContainer()->get(DocumentRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $document = $this->documentRepository->find(1);

        // Perform your assertions based on the repository results
        $this->isInstanceOfdocumentRepository();
        $this->isNotEmptyAndIsArray($document);

    }

    private function isInstanceOfdocumentRepository()
    {
        $this->isInstanceOf(DocumentRepository::class, $this->documentRepository);
    }

    private function isNotEmptyAndIsArray($document)
    {
        $this->assertNotEmpty($document);
        $this->assertIsArray($document);
    }


}
