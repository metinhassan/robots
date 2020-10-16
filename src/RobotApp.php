<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RobotApp extends Command
{
    public function __construct() {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('sim')
            ->setDescription('Run robot simulation')
            ->setHelp('Run robot simulation to figure out where the robot ends up based on input provided');
    }

    protected function execute(InputInterface $input, OutputInterface $output) : int
    {
        $filePath = "testfile.in";
        $commandReader = new CommandFileReader($filePath);
        $table = new Table(5, 5);
        $robot = new Robot($table);
        $sim = new Simulation($robot, $commandReader);
        $sim->run();
        return 0;
    }
}