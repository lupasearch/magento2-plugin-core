<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Model\Data\SearchQueries;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\OrderedMapInterface;

class OrderedMap implements OrderedMapInterface
{
    /**
     * @var array<string, int|float|bool|string|array|OrderedMapInterface>
     */
    private array $map = [];

    /**
     * @inheritDoc
     */
    public function add(string $name, $value): OrderedMapInterface
    {
        $this->map[$name] = $value;

        return $this;
    }

    public function remove(string $name): OrderedMapInterface
    {
        unset($this->map[$name]);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function get(string $name)
    {
        return $this->map[$name] ?? null;
    }

    public function isEmpty(): bool
    {
        return !$this->map;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): ?array
    {
        return $this->map ?: null;
    }
}
