<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Counter;
use App\Repository\CounterRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CountersController
{
    /**
     * @var CounterRepositoryInterface
     */
    private $counterRepository;

    /**
     * CountersController constructor.
     * @param CounterRepositoryInterface $counterRepository
     */
    public function __construct(CounterRepositoryInterface $counterRepository)
    {
        $this->counterRepository = $counterRepository;
    }

    /**
     * @return Response
     */
    public function getAll(): Response
    {
        $counters = $this->counterRepository->all();

        return new JsonResponse([
            'data' => [
                'counters' => $counters,
            ]
        ]);
    }

    /**
     * @param string $alias
     * @param Request $request
     * @return Response
     */
    public function update(string $alias, Request $request): Response
    {
        $counter = $request->request->all();

        $counterModel = $this->counterRepository->findByAlias($alias);

        if ($counterModel === null) {
            $counterModel = new Counter();
        }

        $this->counterRepository->update($counterModel, $counter);

        return new JsonResponse([
            'data' => [
                'success' => true,
            ]
        ]);
    }
}
