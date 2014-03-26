<?php

namespace Gestor\ServicioBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegistroControllerTest extends WebTestCase
{
    public function testRegistro()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/registro');
    }

}
