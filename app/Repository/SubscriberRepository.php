<?php

namespace App\Repository;

use App\DTO\PaginationDTO;
use App\Models\Subscriber;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SubscriberRepository implements SubscriberRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function getOrderByCreatePaginate(PaginationDTO $paginationDTO): LengthAwarePaginator
    {
        return Subscriber::query()
            ->orderBy('created_at','desc')
            ->paginate($paginationDTO->getPerPage(),['*'],'page', $paginationDTO->getPage())
        ;
    }

    /**
     * @inheritdoc
     */
    public function delete(int $intSubscriberID): void
    {
        Subscriber::query()
            ->where('intSubscriberID','=', $intSubscriberID)
            ->delete()
        ;
    }

    /**
     * @inheritdoc
     * @return Subscriber|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object|Subscriber
     */
    public function findByEmail(string $email): ?Subscriber
    {
        return Subscriber::query()
            ->where('varEmail','=',$email)
            ->first()
        ;
    }

    /**
     * @inheritdoc
     */
    public function create(array $data): Subscriber
    {
        $subscriber = new Subscriber();

        $subscriber->varEmail = $data['varEmail'];

        $subscriber->save();

        return $subscriber;
    }
}
