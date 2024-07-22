<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Model\Data\SearchQueries;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\QueryConfigurationInterface;
use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SearchQueryInterface;
use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SuggestionQueryConfigurationInterface;

class SearchQuery implements SearchQueryInterface
{
    private string $id = '';

    private string $description = '';

    /**
     * @var QueryConfigurationInterface|SuggestionQueryConfigurationInterface
     */
    private $configuration;

    private bool $debugMode = false;

    private string $queryKey = '';

    private string $createdByUser = '';

    private string $createdAt = '';

    private string $updatedAt = '';

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): SearchQueryInterface
    {
        $this->id = $id;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): SearchQueryInterface
    {
        $this->description = $description;

        return $this;
    }

    public function getConfiguration(): QueryConfigurationInterface
    {
        return $this->configuration;
    }

    public function setConfiguration(QueryConfigurationInterface $configuration): SearchQueryInterface
    {
        $this->configuration = $configuration;

        return $this;
    }

    public function isDebugMode(): bool
    {
        return $this->debugMode;
    }

    public function setDebugMode(bool $debugMode): SearchQueryInterface
    {
        $this->debugMode = $debugMode;

        return $this;
    }

    public function getQueryKey(): string
    {
        return $this->queryKey;
    }

    public function setQueryKey(string $queryKey): SearchQueryInterface
    {
        $this->queryKey = $queryKey;

        return $this;
    }

    public function getCreatedByUser(): string
    {
        return $this->createdByUser;
    }

    public function setCreatedByUser(string $createdByUser): SearchQueryInterface
    {
        $this->createdByUser = $createdByUser;

        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): SearchQueryInterface
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string $updatedAt): SearchQueryInterface
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'description' => $this->description,
            'configuration' => $this->configuration,
            'debugMode' => $this->debugMode,
        ];
    }
}
