<?php

namespace LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries;

use JsonSerializable;

interface SearchQueryInterface extends JsonSerializable
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @param string $id
     * @return SearchQueryInterface
     */
    public function setId(string $id): SearchQueryInterface;

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @param string $description
     * @return SearchQueryInterface
     */
    public function setDescription(string $description): SearchQueryInterface;

    /**
     * @return SearchQueryConfigurationInterface|SuggestionQueryConfigurationInterface
     */
    public function getConfiguration(): QueryConfigurationInterface;

    /**
     * @param SearchQueryConfigurationInterface|SuggestionQueryConfigurationInterface $configuration
     * @return SearchQueryInterface
     */
    public function setConfiguration(QueryConfigurationInterface $configuration): SearchQueryInterface;

    /**
     * @return bool
     */
    public function isDebugMode(): bool;

    /**
     * @param bool $debugMode
     * @return SearchQueryInterface
     */
    public function setDebugMode(bool $debugMode): SearchQueryInterface;

    /**
     * @return string
     */
    public function getQueryKey(): string;

    /**
     * @param string $queryKey
     * @return SearchQueryInterface
     */
    public function setQueryKey(string $queryKey): SearchQueryInterface;

    /**
     * @return string
     */
    public function getCreatedByUser(): string;

    /**
     * @param string $createdByUser
     * @return SearchQueryInterface
     */
    public function setCreatedByUser(string $createdByUser): SearchQueryInterface;

    /**
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * @param string $createdAt
     * @return SearchQueryInterface
     */
    public function setCreatedAt(string $createdAt): SearchQueryInterface;

    /**
     * @return string
     */
    public function getUpdatedAt(): string;

    /**
     * @param string $updatedAt
     * @return SearchQueryInterface
     */
    public function setUpdatedAt(string $updatedAt): SearchQueryInterface;
}
