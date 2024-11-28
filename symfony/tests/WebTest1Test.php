<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WebTest1Test extends WebTestCase
{
    public function testAccueil(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();

        $this->assertSelectorTextContains('h1', 'Village Green');
    }

    public function testAccueil2(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();

        $crawler = $crawler->filter(".col-sm-6");

        $this->assertEquals($crawler->count(), 3);

    }

    public function testCategories(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();

        $crawler = $client->clickLink('Guitares');

        $crawler = $crawler->filter(".categorie");

        $this->assertEquals($crawler->count(), 3);
    }

    
}
