<?php

namespace App\Http\Controllers\Admin\Api;

use App\Repository\SocialRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SocialsController
{
    /**
     * @var SocialRepositoryInterface
     */
    private $socialRepository;

    /**
     * SocialsController constructor.
     * @param SocialRepositoryInterface $socialRepository
     */
    public function __construct(SocialRepositoryInterface $socialRepository)
    {
        $this->socialRepository = $socialRepository;
    }

    /**
     * @return Response
     */
    public function getAll(): Response
    {
        $socials = $this
            ->socialRepository
            ->getSorted()
        ;

        return new JsonResponse([
            'data' => [
                'socials' => $socials,
            ],
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function saveSort(Request $request): Response
    {
        $socials = (array) $request->request->get('socials', []);

        foreach ($socials as $index => $intSocialID) {
            $this->socialRepository->updateSort($intSocialID, $index);
        }

        return new JsonResponse([
            'data' => [
                'success' => true,
            ],
        ]);
    }

    /**
     * @param int $intSocialID
     * @return Response
     */
    public function delete(int $intSocialID): Response
    {
        $this->socialRepository->delete($intSocialID);

        return new JsonResponse([
            'data' => [
                'success' => true,
            ],
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $socialData = (array) $request->request->get('social');

        $social = $this->socialRepository->create($socialData);

        return new JsonResponse([
            'data' => [
                'social' => $social,
            ]
        ]);
    }

    /**
     * @param int $intSocialID
     * @param Request $request
     * @return Response
     */
    public function update(int $intSocialID, Request $request): Response
    {
        $socialData = (array) $request->request->get('social');

        $social = $this->socialRepository->find($intSocialID);

        if ($social === null) {
            return new JsonResponse([
                'data' => [
                    'success' => false,
                ],
            ]);
        }

        $this->socialRepository->update($social, $socialData);

        return new JsonResponse([
            'data' => [
                'social' => $social,
            ]
        ]);
    }
}
