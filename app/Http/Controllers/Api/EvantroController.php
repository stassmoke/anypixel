<?php

namespace App\Http\Controllers\Api;

use App\Integration\EvantoMarketApi;
use App\Repository\EvantroCodeRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class EvantroController
{
    /**
     * @var EvantoMarketApi
     */
    private $evantoMarketApi;

    /**
     * @var EvantroCodeRepositoryInterface
     */
    private $evantroCodeRepository;

    /**
     * EvantroController constructor.
     * @param EvantoMarketApi $evantoMarketApi
     * @param EvantroCodeRepositoryInterface $evantroCodeRepository
     */
    public function __construct(EvantoMarketApi $evantoMarketApi, EvantroCodeRepositoryInterface $evantroCodeRepository)
    {
        $this->evantoMarketApi = $evantoMarketApi;
        $this->evantroCodeRepository = $evantroCodeRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function checkCode(Request $request): JsonResponse
    {
        try {

            $varCode = $request->get('varCode');
            $intEvantroID = (int) $request->get('intEvantroID');

            if (empty($varCode) || empty($intEvantroID)) {
               throw new \RuntimeException('Invalid request');
            }

            $evantroCode = $this->evantroCodeRepository->findByCodeAndEvantroID($varCode, $intEvantroID);

            if ($evantroCode === null) {
                $evantroPurchase = $this->evantoMarketApi->findPurchase($varCode);

                if (isset($evantroPurchase->error)) {
                    throw new \RuntimeException('Invalid request');
                }

                if ($evantroPurchase->item->author_username !== env('EVANTO_MARKET_USERNAME')) {
                    throw new \RuntimeException('Invalid username');
                }

                $dataEvantroCode = [
                    'varCode' => $varCode,
                    'intEvantroID' => $intEvantroID,
                ];

                $this->evantroCodeRepository->create($dataEvantroCode);
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
