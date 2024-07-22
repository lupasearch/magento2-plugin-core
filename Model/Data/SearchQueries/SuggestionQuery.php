<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Model\Data\SearchQueries;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SuggestionQueryInterface;

use function get_object_vars;

class SuggestionQuery implements SuggestionQueryInterface
{
    private string $searchText = '';

    private int $limit = 0;

    private ?string $sessionId = null;

    private ?string $userId = null;

    private bool $trackTerm = false;

    public function getSearchText(): string
    {
        return $this->searchText;
    }

    public function setSearchText(string $searchText): void
    {
        $this->searchText = $searchText;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }

    public function setUserId(?string $userId): void
    {
        $this->userId = $userId;
    }

    public function isTrackTerm(): bool
    {
        return $this->trackTerm;
    }

    public function setTrackTerm(bool $trackTerm): void
    {
        $this->trackTerm = $trackTerm;
    }

    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }

    public function setSessionId(?string $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
