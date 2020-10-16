#!/usr/bin/env php
<?php
require __DIR__.'/vendor/autoload.php';

use App\RobotApp;
use Symfony\Component\Console\Application;

$application = new Application();

$command = new RobotApp();
$application->add($command);
$application->setDefaultCommand($command->getName());

try {
    $application->run();
} catch (Exception $e) {
}