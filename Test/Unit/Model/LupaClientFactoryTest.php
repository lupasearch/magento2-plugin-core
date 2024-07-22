<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Test\Unit\Model;

use LupaSearch\LupaSearchPluginCore\Model\Config\GeneralConfigInterface;
use LupaSearch\LupaSearchPluginCore\Model\LupaClientFactory;
use LupaSearch\LupaClient;
use LupaSearch\LupaClientInterfaceFactory;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class LupaClientFactoryTest extends TestCase
{
    private LupaClientFactory $lupaClientFactory;

    private MockObject $generalConfig;

    private MockObject $lupaClientInterfaceFactory;

    public function testCreate(): void
    {
        $lupaClient = new LupaClient();
        $this->lupaClientInterfaceFactory
            ->expects(self::once())
            ->method('create')
            ->willReturn($lupaClient);

        $this->generalConfig
            ->expects(self::once())
            ->method('getEmail')
            ->willReturn('info@lupasearch.com');

        $this->generalConfig
            ->expects(self::once())
            ->method('getPassword')
            ->willReturn('password');

        $this->generalConfig
            ->expects(self::once())
            ->method('getJwtToken')
            ->willReturn('jwtToken');

        $this->generalConfig
            ->expects(self::once())
            ->method('getApiKey')
            ->willReturn('apiKey');

        $client = $this->lupaClientFactory->create();

        self::assertEquals('jwtToken', $client->getJwtToken());
        self::assertEquals('apiKey', $client->getApiKey());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->generalConfig = self::createMock(GeneralConfigInterface::class);
        $this->lupaClientInterfaceFactory = self::getMockBuilder(LupaClientInterfaceFactory::class)
            ->disableOriginalConstructor()
            ->setMethods(['create'])
            ->getMock();
        $this->lupaClientFactory = new LupaClientFactory($this->generalConfig, $this->lupaClientInterfaceFactory);
    }
}
