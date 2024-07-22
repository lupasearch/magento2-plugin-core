<?php

namespace LupaSearch\LupaSearchPluginCore\Model\Config;

interface GeneralConfigInterface
{
    public function getEmail(?int $storeId = null): string;

    public function getPassword(?int $storeId = null): string;

    public function getJwtToken(?int $storeId = null): string;

    public function getSearchPath(?int $storeId = null): string;

    public function getSearchQueryKey(?int $storeId = null): string;

    public function getApiKey(?int $storeId = null): string;
}
