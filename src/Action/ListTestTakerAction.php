<?php declare(strict_types=1);

namespace App\Action;

use App\Service\ListTestTakerService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class ListTestTakerAction
{
    private const DEFAULT_DATA_SOURCE = 'json';

    /** @var ListTestTakerService */
    private $listTestTakerService;

    /** @var SerializerInterface */
    private $serializer;

    public function __construct(SerializerInterface $serializer, ListTestTakerService $listTestTakerService)
    {
        $this->listTestTakerService = $listTestTakerService;
        $this->serializer = $serializer;
    }

    public function __invoke(Request $request): JsonResponse
    {
        // TODO : Handle limit, offset, filter.

        $dataSource = $request->query->get('dataSource', static::DEFAULT_DATA_SOURCE);

        $serializedTestTakers = $this->serializer->serialize($this->listTestTakerService->listTestTakers($dataSource), 'json');

        $response = JsonResponse::fromJsonString($serializedTestTakers);

        $response->headers->add(['Access-Control-Allow-Origin' => '*']);

        return $response;
    }
}
