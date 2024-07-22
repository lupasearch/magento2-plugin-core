<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Model\Data\SearchQueries;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\DocumentQueryResponseInterface;
use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\OrderedMapInterface;

class DocumentQueryResponse implements DocumentQueryResponseInterface
{
    private string $searchText;

    private int $total;

    /**
     * @var array<array{_relevance: int|null,...}>
     */
    private array $items;

    private int $limit;

    private int $offset;

    /**
     * @var OrderedMapInterface[]
     */
    private array $sort;

    private OrderedMapInterface $similarQueries;

    /**
     * @var OrderedMapInterface[]
     */
    private array $facets;

    private OrderedMapInterface $abTestDecision;

    /**
     * @param array<array{_relevance: int|null,...}> $items
     * @param OrderedMapInterface[] $sort
     * @param OrderedMapInterface[] $facets
     */
    public function __construct(
        string $searchText,
        int $total,
        array $items,
        int $limit,
        int $offset,
        array $sort,
        OrderedMapInterface $similarQueries,
        array $facets,
        OrderedMapInterface $abTestDecision
    ) {
        $this->searchText = $searchText;
        $this->total = $total;
        $this->items = $items;
        $this->limit = $limit;
        $this->offset = $offset;
        $this->sort = $sort;
        $this->similarQueries = $similarQueries;
        $this->facets = $facets;
        $this->abTestDecision = $abTestDecision;
    }

    public function getSearchText(): string
    {
        return $this->searchText;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @inheritDoc
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @inheritDoc
     */
    public function getSort(): array
    {
        return $this->sort;
    }

    public function getSimilarQueries(): OrderedMapInterface
    {
        return $this->similarQueries;
    }

    /**
     * @inheritDoc
     */
    public function getFacets(): array
    {
        return $this->facets;
    }

    public function getAbTestDecision(): OrderedMapInterface
    {
        return $this->abTestDecision;
    }
}
