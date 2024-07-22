<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Model\Provider;

use LupaSearch\LupaSearchPluginCore\Model\Config\GeneralConfigInterface;
use Magento\Framework\UrlInterface;

use function str_replace;
use function urlencode;

class UrlProvider implements UrlProviderInterface
{
    private UrlInterface $url;

    private GeneralConfigInterface $generalConfig;

    public function __construct(UrlInterface $url, GeneralConfigInterface $generalConfig)
    {
        $this->url = $url;
        $this->generalConfig = $generalConfig;
    }

    /**
     * @inheritDoc
     */
    public function getUrl(string $searchTerm, ?int $storeId = 0, array $params = []): string
    {
        $route = $this->generalConfig->getSearchPath($storeId);
        $queryKey = $this->generalConfig->getSearchQueryKey($storeId);
        $params['_query'][$queryKey] = urlencode($searchTerm);

        return str_replace($route . '/', $route, $this->url->getUrl($route, $params));
    }
}
