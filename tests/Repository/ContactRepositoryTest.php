<?php

namespace App\Tests\Repository;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ContactRepositoryTest extends KernelTestCase
{
    private $contactRepository;

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->contactRepository = static::getContainer()->get(ContactRepository::class);
    }


    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $contact = $this->contactRepository->find(1);

        // Perform your assertions based on the repository results
        $this->isInstanceOfcontactRepository();
        $this->isNotEmptyAndIsArray($contact);

    }

    private function isInstanceOfcontactRepository()
    {
        $this->isInstanceOf(ContactRepository::class, $this->contactRepository);
    }

    private function isNotEmptyAndIsArray($contact)
    {
        $this->assertNotEmpty($contact);
        $this->assertIsArray($contact);
    }

}
