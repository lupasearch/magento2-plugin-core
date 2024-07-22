<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Model\Provider;

interface UrlProviderInterface
{
    /**
     * @param array<string|int, mixed> $params
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     */
    public function getUrl(string $searchTerm, ?int $storeId = 0, array $params = []): string;
}
