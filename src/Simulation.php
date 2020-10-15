<?php


namespace App;

class Simulation
{
    private Robot $robot;
    private Table $table;
    private CommandReader $commandReader;

    function __construct(Robot $robot, Table $table, CommandReader $commandReader) {
        $this->robot = $robot;
        $this->table = $table;
        $this->commandReader = $commandReader;
    }

    public function run() {
        while($command = $this->commandReader->getNext()) {
            echo "COMMAND: " . $command. "\n";
        }
    }
}