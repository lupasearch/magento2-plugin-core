<?php

namespace LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries;

use JsonSerializable;

interface QueryConfigurationInterface extends JsonSerializable
{
    /**
     * @return int
     */
    public function getLimit(): int;

    /**
     * @param int $limit
     * @return QueryConfigurationInterface
     */
    public function setLimit(int $limit): QueryConfigurationInterface;
}
