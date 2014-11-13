<?php

namespace M3y\Phini\Test;

use M3y\Phini\Phini;

class PhiniWithProcessSectionsTest extends \PHPUnit_Framework_TestCase
{
    private $ini;

    /**
     * setUp.
     */
    public function setUp()
    {
        $this->ini = new Phini(__DIR__.DIRECTORY_SEPARATOR."test.ini", true);
    }

    /**
     * @test
     */
    public function セクション名のオブジェクトが取得できること()
    {
        $this->assertInstanceOf("\stdClass", $this->ini->section_one);
        $this->assertInstanceOf("\stdClass", $this->ini->section_two);
    }

    /**
     * @test
     */
    public function セクション内の値が取得できること()
    {
        $this->assertSame("value11", $this->ini->section_one->key11);
        $this->assertSame("value12", $this->ini->section_one->key12);
        $this->assertSame("value13", $this->ini->section_one->key13);
        $this->assertSame("value21", $this->ini->section_two->key21);
        $this->assertSame("value22", $this->ini->section_two->key22);
        $this->assertSame("value23", $this->ini->section_two->key23);
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
