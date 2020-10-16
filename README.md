# Toy Robot Simulator

Toy Robot Simulator reads commands from an input text file, validates, then issues valid commands to
a class simulating a robot moving around on a table.

The bulk of the logic is in the Robot class. It expects perfect input when receiving commands. This is ensured by the 
CommandReader abstract class by a validation function. As per the spec, it will ignore commands that cause it to
end up off the table.

The only output this program provides is a print to stdout whenever a REPORT command is issued, informing of its position
and orientation on the table e.g. 3,2,NORTH.

Development of the Robot class and validation was driven by the tests in the tests/folder.


## Assumptions:
* Table dimensions hard-coded
* Invalid commands are ignored, the Robot just waits for the next one
* Only support file input for commands

## Future Updates
* Separate validator into its own class if validation requirements grow in complexity
* Inject a logger instead of echoing to standard out
* Add reading commands from std in by extending class CommandReader
* Table dimensions turned into command line args

## Requirements
This application developed and tested in the following environment:
* Symfony 5.1 
* PHP 7.4.9
* Linux Mint 19.3
* composer 1.6.3

## Installation
```shell script
git clone git@github.com:metinhassan/robots.git robots
cd robots
composer install
composer update
chmod robots 774 robots.php
```

## Run Tests
```shell script
php ./vendor/bin/simple-phpunit tests --bootstrap vendor/autoload.php 
```

## Run
```shell script
#if file argument is omitted, testfile.in will be used as default
./robots.php --file=testfile.in

# This will also work
./robots.php 

# Get help
./robots.php --help
```