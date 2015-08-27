<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Chonla\Colr\Colr;

$colr = new Colr;

echo $colr->reset()->bg(Colr::RED)->writeln("Hello");
echo $colr->reset()->fg(Colr::RED)->writeln("Hello World");
echo $colr->reset()->fg(Colr::BLACK)->bg(Colr::YELLOW)->writeln("Hello Test");

$colr = new Colr(array(
        "ok" => array("fg" => Colr::BLACK, "bg" => Colr::GREEN),
        "error" => array("fg" => Colr::BLACK, "bg" => Colr::RED)
    ));

echo $colr->reset()->set("error")->writeln("This is an error");
echo $colr->reset()->set("ok")->writeln("This is an ok");