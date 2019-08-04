<?php

namespace App\DTO;

class PaginationDTO
{
    /**
     * @var int
     */
    private $page;

    /**
     * @var int
     */
    private $perPage;

    /**
     * PaginationDTO constructor.
     * @param int $page
     * @param int $perPage
     */
    public function __construct(int $page = 1, int $perPage = 30)
    {
        $this->page = $page;
        $this->perPage = $perPage;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     */
    public function setPerPage(int $perPage): void
    {
        $this->perPage = $perPage;
    }
}
