#!/usr/bin/env php
<?php
require __DIR__.'/vendor/autoload.php';

use App\RobotApp;
use Symfony\Component\Console\Application;

$application = new Application();

$application->add(new RobotApp());

try {
    $application->run();
} catch (Exception $e) {
}