<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries;

interface SuggestionQueryResponseInterface
{
    /**
     * @return \LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\OrderedMapInterface[]
     */
    public function getItems(): array;
}
