<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Test\Unit\Model\Provider;

use LupaSearch\LupaSearchPluginCore\Model\Config\GeneralConfigInterface;
use LupaSearch\LupaSearchPluginCore\Model\Provider\UrlProvider;
use Magento\Framework\UrlInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class UrlProviderTest extends TestCase
{
    private UrlProvider $urlProvider;

    private MockObject $url;

    private MockObject $generalConfig;

    public function testGetUrl(): void
    {
        $searchTerm = 'test search term';
        $storeId = 1;
        $params = ['param1' => 'value1', 'param2' => 'value2'];
        $searchPath = 'search.html';
        $searchQueryKey = 'q';
        $expectedUrl = 'http://example.com/search.html?q=test&param1=value1&param2=value2';
        $url = 'http://example.com/search.html/?q=test&param1=value1&param2=value2';

        $this->generalConfig
            ->expects(self::once())
            ->method('getSearchPath')
            ->with($storeId)
            ->willReturn($searchPath);
        $this->generalConfig
            ->expects(self::once())
            ->method('getSearchQueryKey')
            ->with($storeId)
            ->willReturn($searchQueryKey);
        $this->url
            ->expects(self::once())
            ->method('getUrl')
            ->with(
                $searchPath,
                [
                    '_query' => [$searchQueryKey => 'test+search+term'],
                    'param1' => 'value1',
                    'param2' => 'value2'
                ]
            )
            ->willReturn($url);

        self::assertEquals($expectedUrl, $this->urlProvider->getUrl($searchTerm, $storeId, $params));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->url = self::createMock(UrlInterface::class);
        $this->generalConfig = self::createMock(GeneralConfigInterface::class);
        $this->urlProvider = new UrlProvider($this->url, $this->generalConfig);
    }
}
