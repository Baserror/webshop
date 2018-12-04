<?php

require __DIR__ ."/../php/Factory.php";
require __DIR__ ."/../php/Application.php";
use PHPUnit\Framework\TestCase;

/**
 * @covers  Factory
 * @covers Application
 * @covers Router
 */

class factoryTest extends TestCase
{

public function testCreateApplication(){
    $this->assertInstanceOf(application::class,(new Factory())->createApplication());
}
}
