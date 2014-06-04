<?php

namespace UES\FO\SIGBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TacticoControllerTest extends WebTestCase
{
    public function testEnfermedadespadecidas()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/enfermedades-padecidas');
    }

    public function testTipoperfil()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/tipo-perfil');
    }

    public function testLineasmedias()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/lineas-medias');
    }

    public function testSobremordida()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/sobre-mordidas');
    }

    public function testMordidascruzadas()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/mordidas-cruzadas');
    }

    public function testEstadiosnolla()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/estadios-nolla');
    }

}
