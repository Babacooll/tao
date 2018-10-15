<?php declare(strict_types=1);

namespace App\Action;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GetTestTakerAction
{
    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse(); // TODO
    }
}
