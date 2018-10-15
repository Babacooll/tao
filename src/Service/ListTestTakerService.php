<?php declare(strict_types=1);

namespace App\Service;

use App\Exception\InvalidTestTakerDataSourceException;
use App\Repository\CsvTestTakerRepository;
use App\Repository\JsonTestTakerRepository;

class ListTestTakerService
{
    /** @var CsvTestTakerRepository */
    private $csvTestTakerRepository;

    /** @var JsonTestTakerRepository */
    private $jsonTestTakerRepository;

    public function __construct(CsvTestTakerRepository $csvTestTakerRepository, JsonTestTakerRepository $jsonTestTakerRepository)
    {
        $this->csvTestTakerRepository = $csvTestTakerRepository;
        $this->jsonTestTakerRepository = $jsonTestTakerRepository;
    }

    public function listTestTakers(string $dataSource)
    {
        switch ($dataSource) {
            case 'json':
                return $this->jsonTestTakerRepository->getTestTakers();
            case 'csv':
                return $this->csvTestTakerRepository->getTestTakers();
            default:
                throw new InvalidTestTakerDataSourceException(sprintf("The data source '%s' provided is invalid.", $dataSource));
        }
    }
}
