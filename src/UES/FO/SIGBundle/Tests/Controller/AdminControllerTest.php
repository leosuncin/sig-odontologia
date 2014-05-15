<?php

namespace UES\FO\SIGBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    public function testActividad()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/actividad');
    }

    public function testRespaldarbd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/respaldar-bd');
    }

    public function testRestaurarbd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/restaurar-bd');
    }

}
