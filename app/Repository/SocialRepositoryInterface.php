<?php

namespace App\Repository;

use App\Models\Social;
use Illuminate\Support\Collection;

interface SocialRepositoryInterface
{
    /**
     * @return Collection|Social[]
     */
    public function getSorted(): Collection;

    /**
     * @param Social $social
     * @param array $data
     * @return Social
     */
    public function update(Social $social, array $data): Social;

    /**
     * @param array $data
     * @return Social
     */
    public function create(array $data): Social;

    /**
     * @param int $intSocialID
     * @param int $intOrder
     */
    public function updateSort(int $intSocialID, int $intOrder): void;

    /**
     * @param int $intSocialID
     */
    public function delete(int $intSocialID): void;

    /**
     * @param int $intSocialID
     * @return Social|object|null
     */
    public function find(int $intSocialID): ?Social;
}
