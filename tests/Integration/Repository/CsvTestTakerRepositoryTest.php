<?php declare(strict_types = 1);

namespace App\Tests\Integration\Service;

use App\Model\TestTaker;
use App\Repository\CsvTestTakerRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CsvTestTakerRepositoryTest extends WebTestCase
{
    /** @var CsvTestTakerRepository */
    private $subject;

    protected function setUp()
    {
        parent::setUp();

        self::bootKernel();

        $this->subject = self::$container->get(CsvTestTakerRepository::class);
    }

    public function testItReturnsCorrectTestTakers(): void
    {
        $this->assertEquals(
            $this->getExpectedOutput(),
            $this->subject->getTestTakers()
        );
    }

    private function getExpectedOutput(): array
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
