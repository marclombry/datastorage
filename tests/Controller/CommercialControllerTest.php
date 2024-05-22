<?php

namespace App\Tests\Controller;

use HomeController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CommercialControllerTest extends WebTestCase
{

    const API = [
        'api_secret' => 'YOUR_API_SECRET',
        'api_token' => 'YOUR_API_TOKEN',
        'api_pass' => 'YOUR_API_PASS',
        'api_name' => 'YOUR_API_NAME',
        'e1' => '[ROLE_USER]'
    ];

    public function testFindAll()
    {
        $client = static::createClient();
        $client->request('GET', '/commercials',self::API);


        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
    }

    public function testIndex()
    {
        $client = static::createClient();
        $client->request('GET', '/commercials',self::API);

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
    }

    public function testShow()
    {
        $client = static::createClient();
        $client->request('GET', '/commercial/1',self::API);

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
    }
}
