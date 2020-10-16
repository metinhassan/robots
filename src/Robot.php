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
            $this->executeCommand();
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

    public function getDirection(): string
    {
        return $this->direction;
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

    private function executeCommand() : void {

    }

}