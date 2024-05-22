<?php

namespace App\Tests\Traits;


use App\Traits\TablesAuthorizedTrait;
use PHPUnit\Framework\TestCase;

class TablesAuthorizedTraitTest extends TestCase
{

    public function testTablesAuthorized()
    {
        $permisson = 'e3';
        $mockObject = $this->getMockForTrait(TablesAuthorizedTrait::class);
        $tables = $this->invokePrivateMethod($mockObject, 'getTablesAuthorized');
        $this->assertIsArray($tables);
    }

    private function invokePrivateMethod($object, $methodName, array $arguments = [])
    {
        $reflection = new \ReflectionClass($object);
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
        return $method->invokeArgs($object, $arguments);
    }


}
