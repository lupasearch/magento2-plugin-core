<?php

namespace LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries;

use JsonSerializable;

interface OrderedMapInterface extends JsonSerializable
{
    /**
     * @param string $name
     * @param mixed $value
     * @return OrderedMapInterface
     */
    public function add(string $name, $value): OrderedMapInterface;

    /**
     * @param string $name
     * @return OrderedMapInterface
     */
    public function remove(string $name): OrderedMapInterface;

    /**
     * @param string $name
     * @return mixed
     */
    public function get(string $name);

    /**
     * @return bool
     */
    public function isEmpty(): bool;
}
