<?php
/**
 * Created by PhpStorm.
 * User: b.beeker
 * Date: 25.07.18
 * Time: 15:22
 */

require __DIR__ ."/../php/Adminsection.php";
use PHPUnit\Framework\TestCase;

/**
 * @covers Adminsection
 */

class adminsectionTest extends TestCase
{

public function testPasswordValidationTrue(){

    $_POST['password'] = "testPW";
    $pwtable[0] = password_hash("testPW", PASSWORD_DEFAULT);

    $this->assertTrue((new Adminsection())->passwordValidation($pwtable));
}


    public function testPasswordValidationFalse(){

        $_POST['password'] = "falseTestPW";
        $pwtable[0] = password_hash("testPW", PASSWORD_DEFAULT);

        $this->assertEquals(false, (new Adminsection())->passwordValidation($pwtable));
    }



}
