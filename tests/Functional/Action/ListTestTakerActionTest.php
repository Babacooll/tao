<?php declare(strict_types = 1);

namespace App\Tests\Functional\Action;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ListTestTakerActionTest extends WebTestCase
{
    /**
     * @expectedException \App\Exception\InvalidTestTakerDataSourceException
     * @expectedExceptionMessage The data source 'invalid' provided is invalid.
     */
    public function testItThrowsAnExceptionIfInvalidDataSourceProvided(): void
    {
        $client = static::createClient();

        $client->request('GET', '/test-takers', ['dataSource' => 'invalid']);

        $this->assertEquals(400, $client->getResponse()->getStatusCode());
        $this->assertEquals("The data source 'invalid' provided is invalid.", $client->getResponse()->getContent());
    }

    public function testItReturnsCorrectDataWithDefaultDataSource(): void
    {
        $client = static::createClient();

        $client->request('GET', '/test-takers');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertTrue(
            $client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
            )
        );

        $data = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals(
            $this->getJsonDataSourceExpectedOutput(),
            $data
        );
    }

    public function testItReturnsCorrectDataWitJsonDataSource(): void
    {
        $client = static::createClient();

        $client->request('GET', '/test-takers', ['dataSource' => 'json']);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertTrue(
            $client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
            )
        );

        $data = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals(
            $this->getJsonDataSourceExpectedOutput(),
            $data
        );
    }

    public function testItReturnsCorrectDataWitCsvDataSource(): void
    {
        $client = static::createClient();

        $client->request('GET', '/test-takers', ['dataSource' => 'csv']);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertTrue(
            $client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
            )
        );

        $data = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals(
            $this->getCsvDataSourceExpectedOutput(),
            $data
        );
    }

    private function getJsonDataSourceExpectedOutput(): array
    {
        return [
            [
                'login' => 'login1',
                'password' => 'password1',
                'title' => 'title1',
                'lastname' => 'lastname1',
                'firstname' => 'firstname1',
                'gender' => 'gender1',
                'email' => 'email1',
                'picture' => 'picture1',
                'address' => 'address1',
            ],
            [
                'login' => 'login2',
                'password' => 'password2',
                'title' => 'title2',
                'lastname' => 'lastname2',
                'firstname' => 'firstname2',
                'gender' => 'gender2',
                'email' => 'email2',
                'picture' => 'picture2',
                'address' => 'address2',
            ]
        ];
    }

    private function getCsvDataSourceExpectedOutput(): array
    {
        return [
            [
                'login' => 'login3',
                'password' => 'password3',
                'title' => 'title3',
                'lastname' => 'lastname3',
                'firstname' => 'firstname3',
                'gender' => 'gender3',
                'email' => 'email3',
                'picture' => 'picture3',
                'address' => 'address3',
            ],
            [
                'login' => 'login4',
                'password' => 'password4',
                'title' => 'title4',
                'lastname' => 'lastname4',
                'firstname' => 'firstname4',
                'gender' => 'gender4',
                'email' => 'email4',
                'picture' => 'picture4',
                'address' => 'address4',
            ]
        ];
    }
}
