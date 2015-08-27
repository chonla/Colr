<?php

use Chonla\Colr\Colr;

class ColrTest extends PHPUnit_Framework_TestCase {
    private $colr;

    public function setUp() {
        $this->colr = new Colr;
    }

    public function testForegroundColor() {
        $result = $this->colr->fg(Colr::RED)->write("test");
        $this->assertEquals("\033[0;31mtest\033[0m", $result);
    }

    public function testBackgroundColor() {
        $result = $this->colr->bg(Colr::RED)->write("test");
        $this->assertEquals("\033[41mtest\033[0m", $result);
    }

    public function testForeAndBackGroundColor() {
        $result = $this->colr->fg(Colr::RED)->bg(Colr::RED)->write("test");
        $this->assertEquals("\033[0;31m\033[41mtest\033[0m", $result);
    }

    public function testPlain() {
        $result = $this->colr->write("test");
        $this->assertEquals("test", $result);
    }

    public function testConsequenceCall() {
        $this->colr->fg(Colr::RED)->bg(Colr::RED)->write("test");
        $result = $this->colr->reset()->write("test");
        $this->assertEquals("test", $result);
    }

    public function testWriteNewLine() {
        $result = $this->colr->fg(Colr::RED)->bg(Colr::RED)->writeln("test");
        $this->assertEquals("\033[0;31m\033[41mtest\n\033[0m", $result);
    }

    public function testSingleColorPreset() {
        $colr = new Colr(array(
                "ok" => array("fg" => Colr::BLACK, "bg" => Colr::GREEN)
            ));
        $result = $colr->set("ok")->write("test");
        $this->assertEquals("\033[0;30m\033[42mtest\033[0m", $result);
    }

    public function testMultipleColorsPreset() {
        $colr = new Colr(array(
                "ok" => array("fg" => Colr::BLACK, "bg" => Colr::GREEN),
                "error" => array("fg" => Colr::BLACK, "bg" => Colr::RED)
            ));
        $result = $colr->set("error")->write("test");
        $this->assertEquals("\033[0;30m\033[41mtest\033[0m", $result);
    }

    public function testNotMatchPreset() {
        $colr = new Colr(array(
                "ok" => array("fg" => Colr::BLACK, "bg" => Colr::GREEN)
            ));
        $result = $colr->set("error")->write("test");
        $this->assertEquals("test", $result);
    }

}