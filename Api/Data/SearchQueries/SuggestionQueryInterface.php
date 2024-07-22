<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries;

use JsonSerializable;

interface SuggestionQueryInterface extends JsonSerializable
{
    /**
     * @return string
     */
    public function getSearchText(): string;

    /**
     * @param string $searchText
     * @return void
     */
    public function setSearchText(string $searchText): void;

    /**
     * @return int
     */
    public function getLimit(): int;

    /**
     * @param int $limit
     * @return void
     */
    public function setLimit(int $limit): void;

    /**
     * @return string|null
     */
    public function getUserId(): ?string;

    /**
     * @param string|null $userId
     * @return void
     */
    public function setUserId(?string $userId): void;

    /**
     * @return bool
     */
    public function isTrackTerm(): bool;

    /**
     * @param bool $trackTerm
     * @return void
     */
    public function setTrackTerm(bool $trackTerm): void;

    /**
     * @return string|null
     */
    public function getSessionId(): ?string;

    /**
     * @param string|null $sessionId
     * @return void
     */
    public function setSessionId(?string $sessionId): void;
}
