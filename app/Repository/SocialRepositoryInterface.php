<?php

namespace App\Repository;

use App\Models\Social;
use Illuminate\Support\Collection;

interface SocialRepositoryInterface
{
    /**
     * @return Collection
     */
    public function get(): Collection;

    /**
     * @param Social $social
     * @param array $data
     */
    public function update(Social $social, array $data): void;
}
