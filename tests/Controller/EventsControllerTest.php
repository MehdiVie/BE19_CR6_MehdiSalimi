<?php

namespace App\Test\Controller;

use App\Entity\Events;
use App\Repository\EventsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EventsControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EventsRepository $repository;
    private string $path = '/events/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Events::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Event index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'event[name]' => 'Testing',
            'event[date]' => 'Testing',
            'event[description]' => 'Testing',
            'event[email]' => 'Testing',
            'event[image]' => 'Testing',
            'event[capacity]' => 'Testing',
            'event[phone_number]' => 'Testing',
            'event[url]' => 'Testing',
            'event[type]' => 'Testing',
            'event[street_name]' => 'Testing',
            'event[number]' => 'Testing',
            'event[zip_code]' => 'Testing',
            'event[city_name]' => 'Testing',
        ]);

        self::assertResponseRedirects('/events/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Events();
        $fixture->setName('My Title');
        $fixture->setDate('My Title');
        $fixture->setDescription('My Title');
        $fixture->setEmail('My Title');
        $fixture->setImage('My Title');
        $fixture->setCapacity('My Title');
        $fixture->setPhone_number('My Title');
        $fixture->setUrl('My Title');
        $fixture->setType('My Title');
        $fixture->setStreet_name('My Title');
        $fixture->setNumber('My Title');
        $fixture->setZip_code('My Title');
        $fixture->setCity_name('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Event');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Events();
        $fixture->setName('My Title');
        $fixture->setDate('My Title');
        $fixture->setDescription('My Title');
        $fixture->setEmail('My Title');
        $fixture->setImage('My Title');
        $fixture->setCapacity('My Title');
        $fixture->setPhone_number('My Title');
        $fixture->setUrl('My Title');
        $fixture->setType('My Title');
        $fixture->setStreet_name('My Title');
        $fixture->setNumber('My Title');
        $fixture->setZip_code('My Title');
        $fixture->setCity_name('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'event[name]' => 'Something New',
            'event[date]' => 'Something New',
            'event[description]' => 'Something New',
            'event[email]' => 'Something New',
            'event[image]' => 'Something New',
            'event[capacity]' => 'Something New',
            'event[phone_number]' => 'Something New',
            'event[url]' => 'Something New',
            'event[type]' => 'Something New',
            'event[street_name]' => 'Something New',
            'event[number]' => 'Something New',
            'event[zip_code]' => 'Something New',
            'event[city_name]' => 'Something New',
        ]);

        self::assertResponseRedirects('/events/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getName());
        self::assertSame('Something New', $fixture[0]->getDate());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getImage());
        self::assertSame('Something New', $fixture[0]->getCapacity());
        self::assertSame('Something New', $fixture[0]->getPhone_number());
        self::assertSame('Something New', $fixture[0]->getUrl());
        self::assertSame('Something New', $fixture[0]->getType());
        self::assertSame('Something New', $fixture[0]->getStreet_name());
        self::assertSame('Something New', $fixture[0]->getNumber());
        self::assertSame('Something New', $fixture[0]->getZip_code());
        self::assertSame('Something New', $fixture[0]->getCity_name());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Events();
        $fixture->setName('My Title');
        $fixture->setDate('My Title');
        $fixture->setDescription('My Title');
        $fixture->setEmail('My Title');
        $fixture->setImage('My Title');
        $fixture->setCapacity('My Title');
        $fixture->setPhone_number('My Title');
        $fixture->setUrl('My Title');
        $fixture->setType('My Title');
        $fixture->setStreet_name('My Title');
        $fixture->setNumber('My Title');
        $fixture->setZip_code('My Title');
        $fixture->setCity_name('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/events/');
    }
}
