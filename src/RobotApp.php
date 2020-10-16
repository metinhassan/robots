<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class RobotApp extends Command
{
    public function __construct() {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName("sim")
            ->setDescription("Run robot simulation")
            ->setHelp("Run robot simulation to figure out where the robot ends up based on input provided")
            ->addOption("file", "f", InputOption::VALUE_REQUIRED, "Input file to use", "testfile.in");
    }

    protected function execute(InputInterface $input, OutputInterface $output) : int
    {
        $filePath = $input->getOption("file");
        if (!file_exists($filePath)) {
            die("File does not exist. ./" . basename(__FILE__) . " --help to see usage.\n");
        }

        $commandReader = new CommandFileReader($filePath);
        $table = new Table(5, 5);
        $robot = new Robot($table);

        //Start a simulation
        $sim = new Simulation($robot, $commandReader);
        $sim->run();
        return 0;
    }
}