<?php


namespace App;

class Simulation
{
    private Robot $robot;
    private CommandReader $commandReader;

    function __construct(Robot $robot, CommandReader $commandReader) {
        $this->robot = $robot;
        $this->commandReader = $commandReader;
    }

    public function run() {
        while($command = $this->commandReader->getNext()) {
            $this->robot->issueCommand($command);
        }
    }
}