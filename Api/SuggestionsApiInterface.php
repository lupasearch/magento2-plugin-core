<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Api;

interface SuggestionsApiInterface
{
    /**
     * @return array{succeed?: bool, batchKey?: string, errors?: array{message: string}}
     */
    public function generateSuggestions(string $indexId): array;
}
