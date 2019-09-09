<?php

namespace App\Http\Controllers;

use App\Repository\SubscriberRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SubscribeController
{
    /**
     * @var SubscriberRepositoryInterface
     */
    private $subscriberRepository;

    /**
     * SubscribeController constructor.
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
    public function subscribe(Request $request): Response
    {
        $email = $request->request->get('email');

        if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $subscriber = $this->subscriberRepository->findByEmail($email);

            if (!$subscriber) {
                $data = [
                    'varEmail' => $email,
                ];

                $this->subscriberRepository->create($data);
            }
        }

        return new JsonResponse([
            'data' => [
                'error' => null,
            ]
        ]);
    }
}
