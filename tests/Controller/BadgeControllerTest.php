<?php

namespace App\Tests\Controller;

use HomeController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BadgeControllerTest extends WebTestCase
{
    const API = [
        'api_secret' => 'YOUR_API_SECRET',
        'api_token' => 'YOUR_API_TOKEN',
        'api_pass' => 'YOUR_API_PASS',
        'api_name' => 'YOUR_API_NAME',
        'e1' => '[ROLE_USER]'
    ];

    const LEVEL_PERMISSION = [
        'e3' => ['ROLE_NIV3'],
        '02' => ['ROLE_NIV2'],
        'e1' => ['ROLE_NIV1']
    ];

    public static function getToken()
    {
        return array_merge(self::API, ['e3'=> 'ROLE_NIV3']);
    }

    public function testIndex()
    {
        $client = static::createClient();
        $client->request('GET', '/badge', self::getToken());

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
    }
}
