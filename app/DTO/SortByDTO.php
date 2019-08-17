<?php

namespace App\DTO;

class SortByDTO
{
    /**
     * @var string
     */
    private $column;

    /**
     * @var string
     */
    private $direction;

    /**
     * SortByDTO constructor.
     * @param string $column
     * @param string $direction
     */
    public function __construct(string $column, string $direction)
    {
        $this->column = $column;
        $this->direction = $direction;
    }

    /**
     * @return string
     */
    public function getColumn(): string
    {
        return $this->column;
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }
}
