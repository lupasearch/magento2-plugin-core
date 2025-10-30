<?php

declare(strict_types=1);

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(ComponentRegistrar::MODULE, 'LupaSearch_LupaSearchPluginCore', __DIR__);
ComponentRegistrar::register(
    ComponentRegistrar::LIBRARY,
    'lupasearch/lupasearch-php-client',
    __DIR__ . DIRECTORY_SEPARATOR
    . '..' . DIRECTORY_SEPARATOR
    . 'lupasearch-php-client' . DIRECTORY_SEPARATOR
    . 'src',
);
