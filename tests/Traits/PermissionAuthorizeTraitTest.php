<?php

namespace App\Tests\Traits;

use App\Traits\PermissionAuthorizeTrait;
use PHPUnit\Framework\TestCase;

class PermissionAuthorizeTraitTest extends TestCase
{
    const LEVEL_PERMISSION = [
        'e3' => ['ROLE_NIV3'],
        '02' => ['ROLE_NIV2'],
        'e1' => ['ROLE_NIV1']
    ];

    public function testLevelPermissionExist()
    {
        $permisson = 'e3';
        $mockObject = $this->getMockForTrait(PermissionAuthorizeTrait::class);
        $levelPermission = $this->invokePrivateMethod($mockObject, 'getLevelPermission');
        $this->assertArrayHasKey($permisson, $levelPermission);
    }

    public function testIsArrayAndNotNull()
    {
        $mockObject = $this->getMockForTrait(PermissionAuthorizeTrait::class);
        $levelPermission = $this->invokePrivateMethod($mockObject, 'getLevelPermission');
        $this->assertIsArray($levelPermission);
        $this->assertNotEmpty($levelPermission);
    }

    public function testPermissionWithValibleTrait()
    {
        $mockObject = $this->getMockForTrait(PermissionAuthorizeTrait::class);
        $levelPermission = $this->invokePrivateMethod($mockObject, 'getLevelPermission');
        $mock = new class(){
            use PermissionAuthorizeTrait;
        };

        foreach ($levelPermission as $permission) {
            $this->assertTrue($mock->isLevelPermisson(key($permission)));
        }
    }


    private function invokePrivateMethod($object, $methodName, array $arguments = [])
    {
        $reflection = new \ReflectionClass($object);
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
        return $method->invokeArgs($object, $arguments);
    }

    public function testPermissionAuthorizationByRole()
    {
        $mockObject = $this->getMockForTrait(PermissionAuthorizeTrait::class);

        $permissionByRole = $this->invokePrivateMethod($mockObject, 'getPermissionByRole',['ROLE_NIV3']);

        $this->assertIsArray($permissionByRole);
        $this->assertNotEmpty($permissionByRole);
        $this->assertContainsEquals('ROLE_NIV3',['ROLE_USER','ROLE_NIV3']);
    }

}
