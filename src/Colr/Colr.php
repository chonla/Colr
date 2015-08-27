<?php

namespace Chonla\Colr;

class Colr {
    const BLACK = 0;
    const RED = 1;
    const GREEN = 2;
    const YELLOW = 3;
    const BLUE = 4;
    const MAGENTA = 5;
    const CYAN = 6;
    const WHITE = 7;

    const FG = array(
        '0;30',
        '0;31',
        '0;32',
        '0;33',
        '0;34',
        '0;35',
        '0;36',
        '0;37'
    );

    const BG = array(
        '40',
        '41',
        '42',
        '43',
        '44',
        '45',
        '46',
        '47'
    );

    // Reset
    const RESET = '0';

    private $fgcolor;
    private $bgcolor;
    private $preset;

    function __construct($preset = array()) {
        $this->preset = $preset;
        $this->reset();
    }

    public function reset() {
        $this->fgcolor = '';
        $this->bgcolor = '';
        return $this;
    }

    public function fg($color) {
        $this->fgcolor = self::FG[$color];
        return $this;
    }

    public function bg($color) {
        $this->bgcolor = self::BG[$color];
        return $this;
    }

    public function set($colorset) {
        if (array_key_exists($colorset, $this->preset)) {
            $this->fg($this->preset[$colorset]['fg'])->bg($this->preset[$colorset]['bg']);
        } else {
            $this->reset();
        }
        return $this;
    }

    public function write($text) {
        $buffer = '';
        if ($this->fgcolor !== '') {
            $buffer .= $this->colorize($this->fgcolor);
        }
        if ($this->bgcolor !== '') {
            $buffer .= $this->colorize($this->bgcolor);
        }
        $buffer .= $text;
        if ($this->fgcolor . $this->bgcolor !== '') {
            $buffer .= $this->colorize(self::RESET);
        }

        return $buffer;
    }

    public function writeln($text) {
        return $this->write($text)."\n";
    }

    private function colorize($color) {
        return "\033[" . $color . "m";
    }
}