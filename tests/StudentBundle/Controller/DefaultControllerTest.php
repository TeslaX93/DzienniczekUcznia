<?php

namespace StudentBundle\Tests\Controller;

use StudentBundle\Controller\DefaultController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    /**
     * @throws \Exception
     */
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/list');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Liczba")')->count()
        );
    }

    /**
     * @throws \Exception
     */
    public function testMainView() {
        $client = static::createClient();
        $crawler = $client->request('GET','/2018/7');
        $this->assertGreaterThan(0, $crawler->filter('h2')->count());
    }

    /**
     * @throws \Exception
     */
    public function testRedirectToDate() {
        $client = static::createClient();
        //$crawler = $client->request('GET','/');
        $this->assertTrue($client->getResponse()->isRedirect());
    }
}
