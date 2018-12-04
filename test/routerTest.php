<?php

use PHPUnit\Framework\TestCase;
require __DIR__ ."/../php/Router.php";
require __DIR__ ."/../php/Template.php";

/**
 * @covers Router
 */


class routerTest extends TestCase
{
    public function testGetRoute(){


        $platzi="";
        $template=file_get_contents(__DIR__.'/../html/startseite.html');
        $result=str_replace("%platzi%", $platzi, $template);

        $templateMock = $this->getMockBuilder(TemplateOld::class)
            ->disableOriginalConstructor()
            ->setMethods(['startseite'])
            ->getMock();

        $templateMock->expects($this->exactly(1))
            ->method('startseite')
            ->willReturn($result);




        $this->assertEquals($template, (new Router($templateMock))->getRoute(""));
    }
}
