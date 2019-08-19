<?php

namespace App\Http\Controllers\Admin\Api;

use App\DTO\PaginationDTO;
use App\Repository\SubscriberRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SubscribersController
{
    /**
     * @var SubscriberRepositoryInterface
     */
    private $subscriberRepository;

    /**
     * SubscribersController constructor.
     * @param SubscriberRepositoryInterface $subscriberRepository
     */
    public function __construct(SubscriberRepositoryInterface $subscriberRepository)
    {
        $this->subscriberRepository = $subscriberRepository;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function getList(Request $request): Response
    {
        $page = $request->query->getInt('page',1);
        $perPage = $request->query->getInt('perPage',30);

        $paginationDTO = new PaginationDTO($page, $perPage);

        $productPagination = $this->subscriberRepository->getOrderByCreatePaginate($paginationDTO);

        return new JsonResponse([
            'data' => [
                'subscribers' => $productPagination->items(),
                'pagination' => [
                    'count' => $productPagination->lastPage(),
                    'currentPage' => $productPagination->currentPage(),
                ],
            ]
        ]);
    }

    /**
     * @param int $intSubscriberID
     * @return Response
     */
    public function delete(int $intSubscriberID): Response
    {
        $this->subscriberRepository->delete($intSubscriberID);

        return new JsonResponse([
            'data' => [
                'success' => true,
            ]
        ]);
    }
}
