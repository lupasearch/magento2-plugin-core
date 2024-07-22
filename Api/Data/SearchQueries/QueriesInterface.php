<?php

namespace LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries;

interface QueriesInterface
{
    /**
     * @return int
     */
    public function getCurrentPage(): int;

    /**
     * @param int $currentPage
     * @return QueriesInterface
     */
    public function setCurrentPage(int $currentPage): QueriesInterface;

    /**
     * @return int
     */
    public function getLastPage(): int;

    /**
     * @param int $lastPage
     * @return QueriesInterface
     */
    public function setLastPage(int $lastPage): QueriesInterface;

    /**
     * @return int
     */
    public function getTotal(): int;

    /**
     * @param int $total
     * @return QueriesInterface
     */
    public function setTotal(int $total): QueriesInterface;

    /**
     * @return int
     */
    public function getPerPage(): int;

    /**
     * @param int $perPage
     * @return QueriesInterface
     */
    public function setPerPage(int $perPage): QueriesInterface;

    /**
     * @return SearchQueryInterface[]
     */
    public function getData(): array;

    /**
     * @param SearchQueryInterface[] $data
     */
    public function setData(array $data): QueriesInterface;
}
