<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Model\Data\SearchQueries;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\OrderedMapInterface;
use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\QueryConfigurationInterface;
use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SuggestionQueryConfigurationInterface;

class SuggestionQueryConfiguration implements SuggestionQueryConfigurationInterface
{
    private int $limit = 0;

    private string $documentQueryKey = '';

    /**
     * @var OrderedMapInterface[]
     */
    private array $facets = [];

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): QueryConfigurationInterface
    {
        $this->limit = $limit;

        return $this;
    }

    public function getDocumentQueryKey(): string
    {
        return $this->documentQueryKey;
    }

    public function setDocumentQueryKey(string $documentQueryKey): SuggestionQueryConfigurationInterface
    {
        $this->documentQueryKey = $documentQueryKey;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getFacets(): array
    {
        return $this->facets;
    }

    /**
     * @inheritDoc
     */
    public function setFacets(array $facets): SuggestionQueryConfigurationInterface
    {
        $this->facets = $facets;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        $data = [
            'limit' => $this->limit
        ];

        if ($this->facets && $this->documentQueryKey) {
            $data['facets'] = [
                'documentQueryKey' => $this->documentQueryKey,
                'facets' => $this->facets
            ];
        }

        return $data;
    }
}
