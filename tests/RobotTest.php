<?php


namespace App\Tests;


use App\Robot;
use App\Table;
use PHPUnit\Framework\TestCase;

class RobotTest extends TestCase
{
    public function testPlaceRobot() {
        $robot = new Robot(new Table(5,5));
        $this->assertFalse($robot->isPlaced());
        $robot->place(3,3, "NORTH");
        $this->assertEquals("3,3,NORTH", $robot->report());
        $this->assertTrue($robot->isPlaced());
        $robot->place(3,6, "NORTH");
        $this->assertEquals("3,3,NORTH", $robot->report());
        $robot->place(103,6, "NORTH");
        $this->assertEquals("3,3,NORTH", $robot->report());
        $robot->place(-1,6, "NORTH");
        $this->assertEquals("3,3,NORTH", $robot->report());
        $robot->place(2,5, "EAST");
        $this->assertEquals("2,5,EAST", $robot->report());
        $robot->place(0,0, "EAST");
        $this->assertEquals("0,0,EAST", $robot->report());
        $robot->place(5,5, "EAST");
        $this->assertEquals("5,5,EAST", $robot->report());
    }

    public function testRobotSpinningLeftRight() {
        $robot = new Robot(new Table(5,5));
        $robot->place(3,3, "NORTH");
        $robot->issueCommand("LEFT");
        $this->assertEquals("3,3,WEST", $robot->report());
        $robot->issueCommand("LEFT");
        $this->assertEquals("3,3,SOUTH", $robot->report());
        $robot->issueCommand("LEFT");
        $this->assertEquals("3,3,EAST", $robot->report());
        $robot->issueCommand("LEFT");
        $this->assertEquals("3,3,NORTH", $robot->report());
        $robot->issueCommand("RIGHT");
        $this->assertEquals("3,3,EAST", $robot->report());
        $robot->issueCommand("RIGHT");
        $this->assertEquals("3,3,SOUTH", $robot->report());
        $robot->issueCommand("RIGHT");
        $this->assertEquals("3,3,WEST", $robot->report());
        $robot->issueCommand("RIGHT");
        $this->assertEquals("3,3,NORTH", $robot->report());
    }
}