<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Test\Unit\Model\Config;

use LupaSearch\LupaSearchPluginCore\Model\Config\GeneralConfig;
use Magento\Framework\App\Config\ScopeConfigInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class GeneralConfigTest extends TestCase
{
    private GeneralConfig $generalConfig;

    private MockObject $scopeConfig;

    public function testGetSearchPath(): void
    {
        $this->scopeConfig->expects(self::once())
            ->method('getValue')
            ->with(GeneralConfig::XML_CONFIG_PATH_SEARCH_PATH, 'store', null)
            ->willReturn('search_path');

        self::assertEquals('search_path', $this->generalConfig->getSearchPath());
    }

    public function testGetApiKey(): void
    {
        $this->scopeConfig->expects(self::once())
            ->method('getValue')
            ->with(GeneralConfig::XML_CONFIG_PATH_API_KEY, 'store', null)
            ->willReturn('api_key');

        self::assertEquals('api_key', $this->generalConfig->getApiKey());
    }

    public function testGetSearchQueryKey(): void
    {
        $this->scopeConfig->expects(self::once())
            ->method('getValue')
            ->with(GeneralConfig::XML_CONFIG_PATH_SEARCH_QUERY_KEY, 'store', null)
            ->willReturn('search_query_key');

        self::assertEquals('search_query_key', $this->generalConfig->getSearchQueryKey());
    }

    public function testGetEmail(): void
    {
        $this->scopeConfig->expects(self::once())
            ->method('getValue')
            ->with(GeneralConfig::XML_CONFIG_PATH_EMAIL, 'store', null)
            ->willReturn('email');

        self::assertEquals('email', $this->generalConfig->getEmail());
    }

    public function testGetPassword(): void
    {
        $this->scopeConfig->expects(self::once())
            ->method('getValue')
            ->with(GeneralConfig::XML_CONFIG_PATH_PASSWORD, 'store', null)
            ->willReturn('password');

        self::assertEquals('password', $this->generalConfig->getPassword());
    }

    public function testGetJwtToken(): void
    {
        $this->scopeConfig->expects(self::once())
            ->method('getValue')
            ->with(GeneralConfig::XML_CONFIG_PATH_JWT_TOKEN, 'store', null)
            ->willReturn('jwt_token');

        self::assertEquals('jwt_token', $this->generalConfig->getJwtToken());
    }

    protected function setUp(): void
    {
        $this->scopeConfig = self::createMock(ScopeConfigInterface::class);
        $this->generalConfig = new GeneralConfig($this->scopeConfig);
    }
}
