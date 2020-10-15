<?php


namespace App;


class CommandReader
{
    private array $tempCommands;
    private int $index = 0;

    function __construct() {
        $this->tempCommands = [];
        array_push($this->tempCommands, 'PLACE');
        array_push($this->tempCommands, 'MOVE');
        array_push($this->tempCommands, 'MOVE');
        array_push($this->tempCommands, 'MOVE');
        array_push($this->tempCommands, 'REPORT');
    }

    public function getNext() {
        if ($this->index >= count($this->tempCommands)) {
            return false;
        }

        return $this->tempCommands[$this->index++];
    }
}