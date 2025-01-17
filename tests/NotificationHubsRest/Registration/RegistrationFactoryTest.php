<?php

namespace Openpp\NotificationHubsRest\Registration\Tests;

use Openpp\NotificationHubsRest\Registration\AppleRegistration;
use Openpp\NotificationHubsRest\Registration\GcmRegistration;
use Openpp\NotificationHubsRest\Registration\RegistrationFactory;
use Openpp\NotificationHubsRest\Registration\WindowsRegistration;
use PHPUnit\Framework\TestCase;

class RegistrationFactoryTest extends TestCase
{
    protected $factory;

    public function setUp(): void
    {
        $this->factory = new RegistrationFactory();
        parent::setUp();
    }

    public function testCreateGcmRegistration()
    {
        $registration = $this->factory->createRegistration('gcm');
        $this->assertTrue($registration instanceof GcmRegistration);
    }

    public function testCreateAppleRegistration()
    {
        $registration = $this->factory->createRegistration('apple');
        $this->assertTrue($registration instanceof AppleRegistration);
    }

    public function testCreateWindowsRegistration()
    {
        $registration = $this->factory->createRegistration('windows');
        $this->assertTrue($registration instanceof WindowsRegistration);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testCreateInvalidRegistration()
    {
        $this->expectException(\RuntimeException::class);

        $this->factory->createRegistration('baidu');
    }
}
