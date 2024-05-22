<?php

namespace App\Tests\Repository;

use App\Repository\BadgeRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BadgeRepositoryTest extends KernelTestCase
{
    private $badgeRepository;

    const FIELD_AUTHORIZED = [
      'id','firstname','lastname','fonction','company','tel','email',
        'created_at','target','person','exposant'
    ];

    protected function setUp(): void
    {
        // Boot the Symfony kernel to access the EntityManager
        self::bootKernel();
        $this->badgeRepository = static::getContainer()->get(BadgeRepository::class);
    }

    public function testFindAll()
    {
        // Use the repository methods to test your custom logic
        $badges = $this->badgeRepository->findAll();
        $this->isInstanceOfbadgeRepository();
        $this->isNotEmptyAndIsArray($badges);
        /** too long */
        //$this->isFieldAuthorized($badges);


    }

    public function testFind()
    {
        // Use the repository methods to test your custom logic
        $badge = $this->badgeRepository->find(371);

        // Perform your assertions based on the repository results
        $this->isInstanceOfbadgeRepository();
        $this->isNotEmptyAndIsArray($badge);
        $this->isFieldAuthorized($badge);

    }

    private function isInstanceOfbadgeRepository()
    {
        $this->isInstanceOf(BadgeRepository::class, $this->badgeRepository);
    }

    private function isNotEmptyAndIsArray($badge)
    {
        $this->assertNotEmpty($badge);
        $this->assertIsArray($badge);
    }

    private function isFieldAuthorized($badge)
    {
        if(array_key_exists(0,$badge)){
            // cas du recursive findAll
            foreach ($badge as $key => $b)
            {
                foreach (self::FIELD_AUTHORIZED as $field) {
                    $this->assertArrayHasKey($field, $b);
                }
            }

        } else {
            foreach (self::FIELD_AUTHORIZED as $field) {
                $this->assertArrayHasKey($field, $badge);
            }
        }
    }

    public function testFindAllBadgeByExposant()
    {
        $exposant = 'test';
        $badges = $this->badgeRepository->findAllBadgeByExposant($exposant);
        $this->isNotEmptyAndIsArray($badges);
    }

    public function testFindBadgeById()
    {
        $filtersID = ['id' => 371];
        $badges = $this->badgeRepository->findBadgeBy($filtersID);
        $this->isNotEmptyAndIsArray($badges);
    }

    public function testFindBadgeByVisitor()
    {
        $filtersPersonVisiteur = ['person' => 'visiteur'];
        $badges = $this->badgeRepository->findBadgeBy($filtersPersonVisiteur);
        $this->isNotEmptyAndIsArray($badges);
    }

    public function testFindBadgeByExposant()
    {
        $filtersPersonExposant = ['person' => 'exposant'];
        $badges = $this->badgeRepository->findBadgeBy($filtersPersonExposant);
        $this->isNotEmptyAndIsArray($badges);
    }

    public function testFindAllBadgeByPersonIsVisitor()
    {
        $filtersPersonVisiteur = ['person' => 'visiteur'];
        $badges = $this->badgeRepository->findAllBadgeBy($filtersPersonVisiteur);
        $this->isNotEmptyAndIsArray($badges);
    }

    public function testFindAllBadgeByPersonIsExposant()
    {
        $filtersPersonVisiteur = ['person' => 'exposant'];
        $badges = $this->badgeRepository->findAllBadgeBy($filtersPersonVisiteur);
        $this->isNotEmptyAndIsArray($badges);
    }

    public function testFindAllBadgeByEmail()
    {
        $filtersPersonVisiteur = ['email' => 'cow@boy.com'];
        $badges = $this->badgeRepository->findAllBadgeBy($filtersPersonVisiteur);
        $this->isNotEmptyAndIsArray($badges);
    }

}
