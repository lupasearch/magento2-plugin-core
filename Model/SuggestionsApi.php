<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Model;

use LupaSearch\LupaSearchPluginCore\Api\SuggestionsApiInterface;
use LupaSearch\LupaClientInterface;

class SuggestionsApi implements SuggestionsApiInterface
{
    private LupaClientInterface $client;

    public function __construct(LupaClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @inheritDoc
     */
    public function generateSuggestions(string $indexId): array
    {
        return $this->client->send(LupaClientInterface::METHOD_POST, "/indices/$indexId/suggestions/generate", true);
    }
}
