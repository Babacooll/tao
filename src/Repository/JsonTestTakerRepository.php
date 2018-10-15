<?php declare(strict_types=1);

namespace App\Repository;

use App\Model\TestTaker;

class JsonTestTakerRepository implements TestTakerRepositoryInterface
{
    /** @var string */
    private $jsonFileLocation;

    public function __construct(string $jsonFileLocation)
    {
        $this->jsonFileLocation = $jsonFileLocation;
    }

    /**
     * @return TestTaker[]
     */
    public function getTestTakers(): array
    {
        $data = json_decode(file_get_contents($this->jsonFileLocation), true);

        $testTakers = [];

        // TODO : Adding validation on the data source content might be a good idea.
        // TODO : Could be handled by a Factory.
        foreach ($data as $testTaker) {
            $testTakers[] = new TestTaker(
                $testTaker['login'],
                $testTaker['password'],
                $testTaker['title'],
                $testTaker['lastname'],
                $testTaker['firstname'],
                $testTaker['gender'],
                $testTaker['email'],
                $testTaker['picture'],
                $testTaker['address']);
        }

        return $testTakers;
    }
}
