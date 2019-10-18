<?php

namespace App\Http\Controllers\Api;

use App\Integration\EvantoMarketApi;
use App\Repository\AfterEffectsPackRepositoryInterface;
use App\Repository\EvantroCodeRepositoryInterface;
use App\Repository\EvantroCodeUserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\JsonResponse;

class EvantroController
{
    public const MAX_USERS = 3;

    /**
     * @var EvantoMarketApi
     */
    private $evantoMarketApi;

    /**
     * @var EvantroCodeRepositoryInterface
     */
    private $evantroCodeRepository;

    /**
     * @var AfterEffectsPackRepositoryInterface
     */
    private $afterEffectsPackRepository;

    /**
     * @var EvantroCodeUserRepositoryInterface
     */
    private $evantroCodeUserRepository;

    /**
     * EvantroController constructor.
     * @param EvantoMarketApi $evantoMarketApi
     * @param EvantroCodeRepositoryInterface $evantroCodeRepository
     * @param AfterEffectsPackRepositoryInterface $afterEffectsPackRepository
     * @param EvantroCodeUserRepositoryInterface $evantroCodeUserRepository
     */
    public function __construct(
        EvantoMarketApi $evantoMarketApi,
        EvantroCodeRepositoryInterface $evantroCodeRepository,
        AfterEffectsPackRepositoryInterface $afterEffectsPackRepository,
        EvantroCodeUserRepositoryInterface $evantroCodeUserRepository
    )
    {
        $this->evantoMarketApi = $evantoMarketApi;
        $this->evantroCodeRepository = $evantroCodeRepository;
        $this->afterEffectsPackRepository = $afterEffectsPackRepository;
        $this->evantroCodeUserRepository = $evantroCodeUserRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function checkCode(Request $request): JsonResponse
    {
        try {
            $data = [
                'varCode' => $request->input('code'),
                'varEmail' => $request->input('email'),
                'intEvantroID' => $request->input('intEvantroID'),
                'varUserName' => $request->input('userName'),
            ];

            $validator = Validator::make($data, [
                'varCode' => 'required',
                'varEmail' => 'required|email',
                'intEvantroID' => 'required',
                'varUserName' => 'required',
            ]);

            if ($validator->fails()) {
                throw new \RuntimeException('Invalid request');
            }

            $pack = $this->afterEffectsPackRepository->findByEvantroID($data['intEvantroID']);

            if ($pack === null) {
                throw new \RuntimeException('Not found pack');
            }

            $evantroCode = $this->evantroCodeRepository->findByCode($data['varCode']);

            if ($evantroCode === null) {
                $evantroPurchase = $this->evantoMarketApi->findPurchase($data['varCode']);

                if (isset($evantroPurchase->error)) {
                    throw new \RuntimeException('Invalid request');
                }

                if ($evantroPurchase->item->author_username !== env('EVANTO_MARKET_USERNAME')) {
                    throw new \RuntimeException('Invalid username');
                }

                $evantroCode = $this->evantroCodeRepository->create([
                    'varCode' => $data['varCode'],
                    'intEvantroID' => $pack->intEvantroID,
                ]);
            }

            $evantroCodeUser = $this
                ->evantroCodeUserRepository
                ->findByEvantroAndUserNameAndEmail(
                    $evantroCode,
                    $data['varUserName'],
                    $data['varEmail']
                )
            ;

            if ($evantroCodeUser === null) {
                $countUsers = $this->evantroCodeUserRepository->countByEvantroCode($evantroCode);

                if ($countUsers >= self::MAX_USERS) {
                    throw new \RuntimeException('Limit is exceeded');
                }

                $this->evantroCodeUserRepository->create([
                    'intCodeID' => $evantroCode->intCodeID,
                    'varEmail' => $data['varEmail'],
                    'varUserName' => $data['varUserName'],
                ]);
            }

        } catch (\RuntimeException $exception) {
            return new JsonResponse([
                'data' => [
                    'success' => false,
                ],
            ]);
        }

        return new JsonResponse([
            'data' => [
                'success' => true,
            ],
        ]);
    }
}
