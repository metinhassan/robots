<?php


namespace App;


class CommandFileReader extends CommandReader
{
    private $file;

    function __construct(string $filePath)
    {
        $this->file = fopen($filePath, "r");
    }

    function __destruct()
    {
        fclose($this->file);
    }

    public function getNext() : string {
        if(!feof($this->file)) {
            $command = trim(strtoupper(fgets($this->file)));
        } else {
            return false;
        }

        if ($this->isValidCommand($command)) {
            return $command;
        }
        return Constants::VALID_COMMANDS[Constants::INVALID];
    }
}