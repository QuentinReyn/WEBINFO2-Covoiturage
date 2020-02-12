<?php


namespace App\Tests;


use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testLogin(){
        $client = static::createClient();
        $client->request('/login');
        $this->assertEquals(200,$client->getResponse()->getStatusCode());
    }
}