<?php

namespace App\Http\Controllers\Admin\Api;

use App\Repository\HomepageInfoRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomepageInfoController
{
    /**
     * @var HomepageInfoRepositoryInterface
     */
    private $homepageInfoRepository;

    /**
     * HomepageInfoController constructor.
     * @param HomepageInfoRepositoryInterface $homepageInfoRepository
     */
    public function __construct(HomepageInfoRepositoryInterface $homepageInfoRepository)
    {
        $this->homepageInfoRepository = $homepageInfoRepository;
    }

    /**
     * @return Response
     */
    public function find(): Response
    {
        $homepageInfo = $this->homepageInfoRepository->findOrCreate();

        return new JsonResponse([
            'data' => [
                'homepageInfo' => $homepageInfo,
            ]
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function update(Request $request): Response
    {
        $homepageInfo = $this->homepageInfoRepository->findOrCreate();

        $data = $request->request->all();

        $this->homepageInfoRepository->update($homepageInfo, $data);

        return new JsonResponse([
            'data' => [
                'homepageInfo' => $homepageInfo,
            ]
        ]);
    }
}
