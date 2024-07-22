<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Model\Data\SearchQueries;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\OrderedMapInterface;
use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SuggestionQueryResponseInterface;

class SuggestionQueryResponse implements SuggestionQueryResponseInterface
{
    /**
     * @var OrderedMapInterface[]
     */
    private array $items = [];

    /**
     * @param OrderedMapInterface[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @inheritDoc
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
