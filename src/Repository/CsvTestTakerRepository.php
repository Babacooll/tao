<?php declare(strict_types=1);

namespace App\Repository;

use App\Model\TestTaker;

class CsvTestTakerRepository implements TestTakerRepositoryInterface
{
    /** @var string */
    private $csvFileLocation;

    public function __construct(string $csvFileLocation)
    {
        $this->csvFileLocation = $csvFileLocation;
    }

    /**
     * @return TestTaker[]
     */
    public function getTestTakers(): array
    {
        $data = array_map('str_getcsv', file($this->csvFileLocation));

        unset($data[0]); // TODO : Handle this more smoothly.

        $testTakers = [];

        // TODO : Adding validation on the data source content might be a good idea.
        // TODO : Could be handled by a Factory.
        foreach ($data as $testTaker) {
            $testTakers[] = new TestTaker(
                $testTaker[0],
                $testTaker[1],
                $testTaker[2],
                $testTaker[3],
                $testTaker[4],
                $testTaker[5],
                $testTaker[6],
                $testTaker[7],
                $testTaker[8]);
        }

        return $testTakers;
    }
}
