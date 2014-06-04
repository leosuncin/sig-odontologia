<?php

namespace UES\FO\SIGBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EstrategicoControllerTest extends WebTestCase
{
    public function testRelacionsagital()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/relacion-sagital');
    }

    public function testCitas()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/cantidad-citas');
    }

    public function testTratamiento()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/plan-tratamiento');
    }

    public function testAsistencia()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/asistencias');
    }

    public function testCasos()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/casos-referidos');
    }

}
