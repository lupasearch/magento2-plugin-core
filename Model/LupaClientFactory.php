<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Model;

use LupaSearch\LupaSearchPluginCore\Model\Config\GeneralConfigInterface;
use LupaSearch\LupaClientInterface;
use LupaSearch\LupaClientInterfaceFactory;

class LupaClientFactory implements LupaClientFactoryInterface
{
    private GeneralConfigInterface $generalConfig;

    private LupaClientInterfaceFactory $lupaClientFactory;

    public function __construct(GeneralConfigInterface $generalConfig, LupaClientInterfaceFactory $lupaClientFactory)
    {
        $this->generalConfig = $generalConfig;
        $this->lupaClientFactory = $lupaClientFactory;
    }

    public function create(?int $storeId = null): LupaClientInterface
    {
        $client = $this->lupaClientFactory->create();
        $client->setEmail($this->generalConfig->getEmail($storeId));
        $client->setPassword($this->generalConfig->getPassword($storeId));
        $client->setJwtToken($this->generalConfig->getJwtToken($storeId));
        $client->setApiKey($this->generalConfig->getApiKey($storeId));

        return $client;
    }
}
