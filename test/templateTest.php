<?php
/**
 * Created by PhpStorm.
 * User: b.beeker
 * Date: 19.07.18
 * Time: 09:54
 */

require __DIR__ ."/../php/Template.php";
use PHPUnit\Framework\TestCase;
/**
 * @covers TemplateOld
 */

class templateTest extends TestCase
{


    public function testStartseite(){
        $platzi="";
        $template= file_get_contents(__DIR__ . '/../html/startseite.html');
        $site=str_replace("%placeholder%", $platzi, $template);
        $this->assertEquals($site, (new TemplateOld())->startseite());
    }

    public function testAdminSectionLogin()
    {
        $platzi = file_get_contents(__DIR__ . '/../html/adminLogin.html');
        $template = file_get_contents(__DIR__ . '/../html/startseite.html');
        $site = str_replace("%placeholder%", $platzi, $template);
        $this->assertEquals($site, (new TemplateOld())->adminSectionLogin());
    }

    function testAdminSectionStart(){
        $platzi=file_get_contents(__DIR__ . '/../html/adminSectionStart.html');
        $template= file_get_contents(__DIR__ . '/../html/startseite.html');
        $site=str_replace("%placeholder%", $platzi, $template);
        $this->assertEquals($site, (new TemplateOld())->adminSectionStart());
    }

}
