<?php


namespace App;


class Robot
{
    private int $locX;
    private int $locY;
    private string $direction;
    private bool $isPlaced;
    private Table $table;


    function __construct($table)
    {
        $this->table = $table;
        $this->isPlaced = false;
    }

    public function report() : string {
        return $this->locX . "," . $this->locY . "," . $this->direction;
    }

    public function issueCommand(string $command) : void {
        if ($this->isPlaced) {
            $this->executeCommand($command);
        }
    }

    public function place($locX, $locY, $direction) : void {
        if ($this->isWithinBounds($locX, $locY)) {
            $this->locX = $locX;
            $this->locY = $locY;
            $this->direction = $direction;
            $this->isPlaced = true;
        }
    }

    public function setDirection(string $direction): void
    {
        $this->direction = $direction;
    }

    public function isPlaced()
    {
        return $this->isPlaced;
    }

    private function isWithinBounds(int $coordX, int $coordY) {
        return $coordX <= $this->table->getWidth() && $coordY <= $this->table->getHeight();
    }

    private function executeCommand(string $command) : void {
        if ($command === Constants::VALID_COMMANDS[Constants::LEFT] || $command === Constants::VALID_COMMANDS[Constants::RIGHT]) {
            $this->changeDirection($command);
        }
    }

    private function changeDirection(string $turnTowards) {
        $directions = array(
            Constants::VALID_DIRECTIONS[Constants::NORTH],
            Constants::VALID_DIRECTIONS[Constants::EAST],
            Constants::VALID_DIRECTIONS[Constants::SOUTH],
            Constants::VALID_DIRECTIONS[Constants::WEST]
        );

        $currentKey = array_search($this->direction, $directions);
        if ($turnTowards === Constants::VALID_COMMANDS[Constants::LEFT]) {
            $this->direction = $directions[abs($currentKey+3) % 4];
        } else if ($turnTowards === Constants::VALID_COMMANDS[Constants::RIGHT]) {
            $this->direction = $directions[abs($currentKey+5) % 4];
        }
    }
}