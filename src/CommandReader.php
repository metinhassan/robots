<?php


namespace App;


abstract class CommandReader
{
    abstract public function getNext() : string;

    public function isValidCommand(string $command) : bool {

        if (in_array($command, Constants::VALID_COMMANDS) && substr($command, 0, 5) !== Constants::VALID_COMMANDS[Constants::PLACE]) {
            return true;
        }

        if (substr($command, 0, strlen(Constants::VALID_COMMANDS[Constants::PLACE])) === Constants::VALID_COMMANDS[Constants::PLACE]) {
            $coordsFacing = str_replace(Constants::VALID_COMMANDS[Constants::PLACE], "", $command);
            $coordsFacing = str_replace(" ", "", $coordsFacing);
            $coordsFacingArray = explode(',', $coordsFacing);

            if (!ctype_digit($coordsFacingArray[0]) || !ctype_digit($coordsFacingArray[1])) {
                return false;
            }
            if (!in_array($coordsFacingArray[2], Constants::VALID_DIRECTIONS)) {
                return false;
            }

            return true;
        }

        return false;
    }
}