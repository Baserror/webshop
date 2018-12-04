<?php
/**
 * Created by PhpStorm.
 * User: b.beeker
 * Date: 19.07.18
 * Time: 09:38
 */

use PHPUnit\Framework\TestCase;
require __DIR__ ."/../php/Application.php";

/**
 * @covers Application
 */

class applicationTest extends TestCase
{


    public function testRun(){

        $routerMock = $this->getMockBuilder(Router::class)
            ->disableOriginalConstructor()
            ->setMethods(['getRoute'])
            ->getMock();

        $routerMock->expects($this->exactly(1))
            ->method('getRoute')
            ->willReturn('route');

        $this->expectOutputString('route' . (new Application($routerMock))->run(""));
    }

}
