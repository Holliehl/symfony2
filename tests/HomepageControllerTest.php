<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomepageControllerTest extends WebTestCase
{
  public function testIndex()
  {
    $client = static::createClient();
    $crawler = $client->request('GET', '/home_page');
    $this->assertSame(200, $client->getResponse()->getStatusCode());
    $this->assertContains('Hello HomePageController',
    $crawler->filter('h1')->text());
  }

  public function testUsager()
 {
   $client = static::createClient();
   $crawler = $client->request('GET', '/usager/Chow');
   $this->assertSame(200, $client->getResponse()->getStatusCode());
   $this->assertContains('Hello Arty', $crawler->filter('h1')->text());
 }

 public function testUsagerNotFound()
 {
   $client = static::createClient();
   $crawler = $client->request('GET', '/usager/Tom');
   $this->assertSame(404, $client->getResponse()->getStatusCode());
   $this->assertContains('Usager inconnu', $crawler->filter('title')->text());
 }
}
