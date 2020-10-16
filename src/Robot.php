<?php


namespace App;


class Robot
{
    private int $locX;
    private int $locY;
    private string $directionFacing;
    private bool $isPlaced;
    private Table $table;


    function __construct($table)
    {
        $this->locX = 0;
        $this->locY = 0;
        $this->directionFacing = "";
        $this->table = $table;
        $this->isPlaced = false;
    }

    public function report() : string {
        return $this->locX . "," . $this->locY . "," . $this->directionFacing;
    }

    public function issueCommand(string $command) : void {
        $this->executeCommand($command);
    }

    public function place($locX, $locY, $direction) : void {
        if ($this->isWithinBounds($locX, $locY)) {
            $this->locX = $locX;
            $this->locY = $locY;
            $this->directionFacing = $direction;
            $this->isPlaced = true;
        }
    }

    public function setDirectionFacing(string $directionFacing): void {
        $this->directionFacing = $directionFacing;
    }

    public function isPlaced() : bool {
        return $this->isPlaced;
    }

    private function isWithinBounds(int $coordX, int $coordY) : bool {
        return $coordX <= $this->table->getWidth() && $coordY <= $this->table->getHeight()
               && $coordX >= 0 && $coordY >= 0;
    }

    private function executeCommand(string $command) : void {

        switch ($command) {
            case Constants::VALID_COMMANDS[Constants::MOVE]:
                $this->move();
                break;
            case Constants::VALID_COMMANDS[Constants::LEFT]:
            case Constants::VALID_COMMANDS[Constants::RIGHT]:
                $this->changeDirection($command);
                break;
            case Constants::VALID_COMMANDS[Constants::REPORT]:
                $this->printReport();
                break;
            default:
                if (Constants::VALID_COMMANDS[Constants::PLACE] === substr($command, 0, strlen(Constants::VALID_COMMANDS[Constants::PLACE]))) {
                    $placeParams = $this->parsePlaceCommand($command);
                    $this->place($placeParams[0], $placeParams[1], $placeParams[2]);
                }
                break;
        }
    }

    private function printReport() {
        echo $this->report() . "\n";
    }

    private function move() : void {
        switch ($this->directionFacing) {
            case Constants::VALID_DIRECTIONS[Constants::NORTH]:
                if($this->isWithinBounds($this->locX, $this->locY + 1)) {
                    $this->locY++;
                }
                break;
            case Constants::VALID_DIRECTIONS[Constants::WEST]:
                if($this->isWithinBounds($this->locX - 1, $this->locY)) {
                    $this->locX--;
                }
                break;
            case Constants::VALID_DIRECTIONS[Constants::SOUTH]:
                if($this->isWithinBounds($this->locX, $this->locY - 1)) {
                    $this->locY--;
                }
                break;
            case Constants::VALID_DIRECTIONS[Constants::EAST]:
                if($this->isWithinBounds($this->locX + 1, $this->locY)) {
                    $this->locX++;
                }
                break;
            default:
                break;
        }
    }

    private function parsePlaceCommand(string $command) : array {
        $coordsFacing = str_replace(Constants::VALID_COMMANDS[Constants::PLACE], "", $command);
        $coordsFacing = str_replace(" ", "", $coordsFacing);
        return explode(',', $coordsFacing);
    }

    private function changeDirection(string $turnTowards) : void {
        $directions = array(
            Constants::VALID_DIRECTIONS[Constants::NORTH],
            Constants::VALID_DIRECTIONS[Constants::EAST],
            Constants::VALID_DIRECTIONS[Constants::SOUTH],
            Constants::VALID_DIRECTIONS[Constants::WEST]
        );

        $currentKey = array_search($this->directionFacing, $directions);
        if ($turnTowards === Constants::VALID_COMMANDS[Constants::LEFT]) {
            $this->directionFacing = $directions[abs($currentKey+3) % 4];
        } else if ($turnTowards === Constants::VALID_COMMANDS[Constants::RIGHT]) {
            $this->directionFacing = $directions[($currentKey+1) % 4];
        }
    }
}