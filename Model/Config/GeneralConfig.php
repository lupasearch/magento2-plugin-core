<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Model\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class GeneralConfig implements GeneralConfigInterface
{
    public const XML_CONFIG_PATH_EMAIL = 'lupasearch/general/email';
    public const XML_CONFIG_PATH_PASSWORD = 'lupasearch/general/password';
    public const XML_CONFIG_PATH_JWT_TOKEN = 'lupasearch/general/jwt_token';
    public const XML_CONFIG_PATH_SEARCH_PATH = 'lupasearch/general/search_path';
    public const XML_CONFIG_PATH_SEARCH_QUERY_KEY = 'lupasearch/general/search_query_key';
    public const XML_CONFIG_PATH_API_KEY = 'lupasearch/general/api_key';

    protected ScopeConfigInterface $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function getEmail(?int $storeId = null): string
    {
        return (string)$this->scopeConfig->getValue(
            self::XML_CONFIG_PATH_EMAIL,
            ScopeInterface::SCOPE_STORE,
            $storeId,
        );
    }

    public function getPassword(?int $storeId = null): string
    {
        return (string)$this->scopeConfig->getValue(
            self::XML_CONFIG_PATH_PASSWORD,
            ScopeInterface::SCOPE_STORE,
            $storeId,
        );
    }

    public function getJwtToken(?int $storeId = null): string
    {
        return (string)$this->scopeConfig->getValue(
            self::XML_CONFIG_PATH_JWT_TOKEN,
            ScopeInterface::SCOPE_STORE,
            $storeId,
        );
    }

    public function getSearchPath(?int $storeId = null): string
    {
        return (string)$this->scopeConfig->getValue(
            self::XML_CONFIG_PATH_SEARCH_PATH,
            ScopeInterface::SCOPE_STORE,
            $storeId,
        );
    }

    public function getSearchQueryKey(?int $storeId = null): string
    {
        return (string)$this->scopeConfig->getValue(
            self::XML_CONFIG_PATH_SEARCH_QUERY_KEY,
            ScopeInterface::SCOPE_STORE,
            $storeId,
        );
    }

    public function getApiKey(?int $storeId = null): string
    {
        return (string)$this->scopeConfig->getValue(
            self::XML_CONFIG_PATH_API_KEY,
            ScopeInterface::SCOPE_STORE,
            $storeId,
        );
    }
}
