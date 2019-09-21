<?php

namespace App\Http\Controllers\Api;

use App\Integration\EvantoMarketApi;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class EvantroController
{
    /**
     * @var EvantoMarketApi
     */
    private $evantoMarketApi;

    /**
     * EvantroController constructor.
     * @param EvantoMarketApi $evantoMarketApi
     */
    public function __construct(EvantoMarketApi $evantoMarketApi)
    {
        $this->evantoMarketApi = $evantoMarketApi;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function checkCode(Request $request): JsonResponse
    {
        $code = $request->request->get('code');
        $project = $request->request->get('project');
        $intPackID = $request->request->getInt('intPackID');
    }
}
