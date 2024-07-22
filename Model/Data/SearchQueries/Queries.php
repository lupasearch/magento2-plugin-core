<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Model\Data\SearchQueries;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\QueriesInterface;
use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SearchQueryInterface;

class Queries implements QueriesInterface
{
    private int $currentPage = 1;

    private int $lastPage = 1;

    private int $total = 0;

    private int $perPage = 10;

    /**
     * @var SearchQueryInterface[]
     */
    private array $data = [];

    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    public function setCurrentPage(int $currentPage): QueriesInterface
    {
        $this->currentPage = $currentPage;

        return $this;
    }

    public function getLastPage(): int
    {
        return $this->lastPage;
    }

    public function setLastPage(int $lastPage): QueriesInterface
    {
        $this->lastPage = $lastPage;

        return $this;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): QueriesInterface
    {
        $this->total = $total;

        return $this;
    }

    public function getPerPage(): int
    {
        return $this->perPage;
    }

    public function setPerPage(int $perPage): QueriesInterface
    {
        $this->perPage = $perPage;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @inheritDoc
     */
    public function setData(array $data): QueriesInterface
    {
        $this->data = $data;

        return $this;
    }
}
