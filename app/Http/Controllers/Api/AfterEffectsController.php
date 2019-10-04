<?php

namespace App\Http\Controllers\Api;

use App\Models\AfterEffectsPack;
use App\Repository\AfterEffectsPackRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class AfterEffectsController
{
    /**
     * @var AfterEffectsPackRepositoryInterface
     */
    private $afterEffectsPackRepository;

    /**
     * AfterEffectsController constructor.
     * @param AfterEffectsPackRepositoryInterface $afterEffectsPackRepository
     */
    public function __construct(AfterEffectsPackRepositoryInterface $afterEffectsPackRepository)
    {
        $this->afterEffectsPackRepository = $afterEffectsPackRepository;
    }

    /**
     * @return JsonResponse
     */
    public function getEnabledSorted(): JsonResponse
    {
        $packs = $this
            ->afterEffectsPackRepository
            ->getEnabledSorted()
            ->map(function (AfterEffectsPack $afterEffectsPack) {
                return [
                    'intPackID' => $afterEffectsPack->intEvantroID,
                    'varName' => $afterEffectsPack->varName,
                    'varDescription' => $afterEffectsPack->varDescription,
                    'varLink' => $afterEffectsPack->varLink,
                    'varVersion' => $afterEffectsPack->varVersion,
                    'varImg' => url('/storage/images/' . $afterEffectsPack->varImg),
                ];
            })
        ;

        return new JsonResponse([
            'data' => [
                'packs' => $packs,
            ]
        ]);
    }
}
