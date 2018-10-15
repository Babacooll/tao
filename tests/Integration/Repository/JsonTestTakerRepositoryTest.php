<?php declare(strict_types = 1);

namespace App\Tests\Integration\Service;

use App\Model\TestTaker;
use App\Repository\JsonTestTakerRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class JsonTestTakerRepositoryTest extends WebTestCase
{
    /** @var JsonTestTakerRepository */
    private $subject;

    protected function setUp()
    {
        parent::setUp();

        self::bootKernel();

        $this->subject = self::$container->get(JsonTestTakerRepository::class);
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
}
