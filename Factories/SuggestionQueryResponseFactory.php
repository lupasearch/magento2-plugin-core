<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Factories;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\OrderedMapInterface;
use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SuggestionQueryResponseInterface;
use LupaSearch\LupaSearchPluginCore\Model\Data\SearchQueries\SuggestionQueryResponse;

use function array_map;

class SuggestionQueryResponseFactory implements SuggestionQueryResponseFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(array $data): SuggestionQueryResponseInterface
    {
        return new SuggestionQueryResponse(
            array_map(
                static function (array $item): OrderedMapInterface {
                    return OrderedMapFactory::create($item);
                },
                $data,
            )
        );
    }
}
