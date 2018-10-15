<?php declare(strict_types = 1);

namespace App\Tests\Integration\Service;

use App\Model\TestTaker;
use App\Service\ListTestTakerService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ListTestFakerServiceTest extends WebTestCase
{
    /** @var ListTestTakerService */
    private $subject;

    protected function setUp()
    {
        parent::setUp();

        self::bootKernel();

        $this->subject = self::$container->get(ListTestTakerService::class);
    }

    /**
     * @expectedException \App\Exception\InvalidTestTakerDataSourceException
     * @expectedExceptionMessage The data source 'invalid' provided is invalid.
     */
    public function testItReturnsThrowsExceptionIfInvalidDataSourceProvided(): void
    {
        $this->subject->listTestTakers('invalid');
    }

    public function testItReturnsCorrectTestTakersWithJsonDataSource(): void
    {
        $this->assertEquals(
            $this->getJsonDataSourceExpectedOutput(),
            $this->subject->listTestTakers('json')
        );
    }

    public function testItReturnsCorrectTestTakersWithCsvDataSource(): void
    {
        $this->assertEquals(
            $this->getCsvDataSourceExpectedOutput(),
            $this->subject->listTestTakers('csv')
        );
    }

    private function getJsonDataSourceExpectedOutput(): array
    {
        return [
            new TestTaker(
                'login1',
                'password1',
                'title1',
                'lastname1',
                'firstname1',
                'gender1',
                'email1',
                'picture1',
                'address1'
            ),
            new TestTaker(
                'login2',
                'password2',
                'title2',
                'lastname2',
                'firstname2',
                'gender2',
                'email2',
                'picture2',
                'address2'
            )
        ];
    }

    private function getCsvDataSourceExpectedOutput(): array
    {
        return [
            new TestTaker(
                'login3',
                'password3',
                'title3',
                'lastname3',
                'firstname3',
                'gender3',
                'email3',
                'picture3',
                'address3'
            ),
            new TestTaker(
                'login4',
                'password4',
                'title4',
                'lastname4',
                'firstname4',
                'gender4',
                'email4',
                'picture4',
                'address4'
            )
        ];
    }
}
