<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Model\Cache\Type;

use Magento\Framework\App\Cache\Type\FrontendPool;
use Magento\Framework\Cache\Frontend\Decorator\TagScope;

class LupaSearchCache extends TagScope
{
    public const TYPE_IDENTIFIER = 'lupasearch';
    public const CACHE_TAG = 'LS';

    public function __construct(FrontendPool $cacheFrontendPool)
    {
        parent::__construct($cacheFrontendPool->get(self::TYPE_IDENTIFIER), self::CACHE_TAG);
    }
}
