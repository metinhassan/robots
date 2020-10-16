# Toy Robot Simulator


## Requirements
This application developed and tested in the following environment:
* Symfony 5.1 
* PHP 7.4.9
* Linux Mint 19.3
* composer 1.6.3

```
git clone git@github.com:metinhassan/robots.git robots
cd robots
composer install
composer update
chmod robots 774 robots.php
```

## Run Tests
```
php ./vendor/bin/simple-phpunit tests --bootstrap vendor/autoload.php 
```

## Run
``````
#if file argument is omitted, testfile.in will be used as default
./robots.php --file=testfile.in

# This will also work
./robots.php 

# Get help
./robots.php --help
```