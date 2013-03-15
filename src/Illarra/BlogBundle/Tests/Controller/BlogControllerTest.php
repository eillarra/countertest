<?php

namespace Illarra\BlogBundle\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class BlogControllerTest extends WebTestCase
{
    public function testCompleteScenario()
    {
        // Create a new client to browse the application
        $client = static::createClient();
        
        /*$crawler = $client->request('GET', '/en/blog');
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());*/
    }
    
    public function testIndex()
    {
        $client = static::createClient();
        
        // add all your doctrine fixtures classes
        $classes = array(
            // classes implementing Doctrine\Common\DataFixtures\FixtureInterface
            'Illarra\BlogBundle\DataFixtures\ORM\LoadBlogData'
        );
        
        $this->loadFixtures($classes);
        
        $crawler = $client->request('GET', '/es/blog');
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());
    }
}
