<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Factories;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\DocumentQueryResponseInterface;
use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\OrderedMapInterface;
use LupaSearch\LupaSearchPluginCore\Model\Data\SearchQueries\DocumentQueryResponse;

use function array_map;

class DocumentQueryResponseFactory implements DocumentQueryResponseFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(array $data): DocumentQueryResponseInterface
    {
        return new DocumentQueryResponse(
            (string)($data['searchText'] ?? ''),
            (int)($data['total'] ?? 0),
            $data['items'] ?? [],
            (int)($data['limit'] ?? 0),
            (int)($data['offset'] ?? 0),
            $this->prepareOrderedMaps($data['sort'] ?? []),
            OrderedMapFactory::create($data['similarQueries'] ?? []),
            $this->prepareOrderedMaps($data['facets'] ?? []),
            OrderedMapFactory::create($data['abTestDecision'] ?? []),
        );
    }

    /**
     * @param mixed[][] $data
     * @return OrderedMapInterface[]
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     */
    private function prepareOrderedMaps(array $data): array
    {
        return array_map(
            static function (array $item) {
                return OrderedMapFactory::create($item);
            },
            $data,
        );
    }
}
