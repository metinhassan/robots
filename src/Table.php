<?php


namespace App;


class Table
{
    private int $height;
    private int $width;

    function __construct($height, $width) {
        $this->height = $height;
        $this->width = $width;
    }

    public function getHeight() : int {
        return $this->height;
    }

    public function getWidth() : int {
        return $this->width;
    }
}