<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Factories;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\DocumentQueryResponseInterface;

interface DocumentQueryResponseFactoryInterface
{
    /**
     * @param mixed[] $data
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     */
    public function create(array $data): DocumentQueryResponseInterface;
}
