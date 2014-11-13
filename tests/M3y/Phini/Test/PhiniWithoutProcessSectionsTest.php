<?php

namespace M3y\Phini\Test;

use M3y\Phini\Phini;

class PhiniWithoutProcessSectionsTest extends \PHPUnit_Framework_TestCase
{
    private $ini;

    /**
     * setUp.
     */
    public function setUp()
    {
        $this->ini = new Phini(__DIR__.DIRECTORY_SEPARATOR."test.ini");
    }

    /**
     * @test
     */
    public function セクションを除外して設定を読み込むこと()
    {
        $this->assertSame("value11", $this->ini->key11);
        $this->assertSame("value12", $this->ini->key12);
        $this->assertSame("value13", $this->ini->key13);
        $this->assertSame("value21", $this->ini->key21);
        $this->assertSame("value22", $this->ini->key22);
        $this->assertSame("value23", $this->ini->key23);
    }

    /**
     * @test
     */
    public function 配列形式の設定に対応していること()
    {
        $this->assertTrue(is_array($this->ini->key3));
        $this->assertSame(array("value31", "value32", "value33"), $this->ini->key3);
    }
}
