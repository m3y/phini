<?php

namespace M3y\Phini\Test;

use M3y\Phini\Phini;

class PhiniTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function インスタンスを作成できること()
    {
        $ini = new Phini(__DIR__.DIRECTORY_SEPARATOR."test.ini");
        $this->assertInstanceOf('M3y\Phini\Phini', $ini);
    }

    /**
     * @test
     * @expectedException RuntimeException
     */
    public function 存在しないファイルパスの場合、例外が投げられること()
    {
        $ini = new Phini('illegal.ini');
    }

    /**
     * @test
     */
    public function 設定ファイルにない値を取得した場合、nullがかえること()
    {
        $ini = new Phini(__DIR__.DIRECTORY_SEPARATOR."test.ini");
        $this->assertNull($ini->nothing);
    }
}
