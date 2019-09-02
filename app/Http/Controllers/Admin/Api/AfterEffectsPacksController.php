<?php

namespace App\Http\Controllers\Admin\Api;

use App\Repository\AfterEffectsPackRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AfterEffectsPacksController
{
    /**
     * @var AfterEffectsPackRepositoryInterface
     */
    private $afterEffectsPackRepository;

    /**
     * AfterEffectsPacksController constructor.
     * @param AfterEffectsPackRepositoryInterface $afterEffectsPackRepository
     */
    public function __construct(AfterEffectsPackRepositoryInterface $afterEffectsPackRepository)
    {
        $this->afterEffectsPackRepository = $afterEffectsPackRepository;
    }

    /**
     * @return Response
     */
    public function listOfPacks(): Response
    {
        $packs = $this
            ->afterEffectsPackRepository
            ->getSorted()
        ;

        return new JsonResponse([
            'data' => [
                'packs' => $packs
            ],
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function saveSort(Request $request): JsonResponse
    {
        $packs = (array) $request->request->get('packs', []);

        foreach ($packs as $index => $intPackID) {
            $this->afterEffectsPackRepository->updateOrder($intPackID, $index);
        }

        return new JsonResponse([
            'data' => [
                'success' => true,
            ],
        ]);
    }

    /**
     * @param int $intPackID
     * @return JsonResponse
     */
    public function delete(int $intPackID): JsonResponse
    {
        $this->afterEffectsPackRepository->delete($intPackID);

        return new JsonResponse([
            'data' => [
                'success' => true,
            ],
        ]);
    }

    /**
     * @param int $intPackID
     * @return Response
     */
    public function find(int $intPackID): Response
    {
        $pack = $this->afterEffectsPackRepository->find($intPackID);

        return new JsonResponse([
            'data' => [
                'pack' => $pack,
            ]
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $dataPack = $request->request->get('pack');

        $validator = Validator::make($dataPack, [
            'varName' => 'required|max:255|unique:products',
            'varLink' => 'required|url',
            'isEnabled' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return new JsonResponse([
                'data' => [
                    'errors' => $validator->validate(),
                ],
            ]);
        }

        $pack = $this->afterEffectsPackRepository->create($dataPack);

        return new JsonResponse([
            'data' => [
                'link' => route('admin.ae-packs.edit', [
                    'intPackID' => $pack->intPackID,
                ]),
                'pack' => $pack,
            ],
        ]);
    }
}
