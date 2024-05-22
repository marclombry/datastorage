<?php

namespace App\Tests\Repository;

use App\Repository\DocumentDetailRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DocumentDetailRepositoryTest extends KernelTestCase
{
    private $documentDetailRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->documentDetailRepository = static::getContainer()->get(DocumentDetailRepository::class);
    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $documentDetail = $this->documentDetailRepository->find(10);

        // Perform your assertions based on the repository results
        $this->isInstanceOfDocumentDetailRepository();
        $this->isNotEmptyAndIsArray($documentDetail);

    }

    private function isInstanceOfDocumentDetailRepository()
    {
        $this->isInstanceOf(DocumentDetailRepository::class, $this->documentDetailRepository);
    }

    private function isNotEmptyAndIsArray($documentDetail)
    {
        $this->assertNotEmpty($documentDetail);
        $this->assertIsArray($documentDetail);
    }


}
