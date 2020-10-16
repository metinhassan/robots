<?php


namespace App\Tests;


use App\CommandFileReader;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use PHPUnit\Framework\TestCase;

class CommandFileReaderTest extends TestCase
{

    private vfsStreamDirectory $file_system;

    public function setUp() : void
    {
        $directory = [
            "mocks" => [
                "mockfile.in" => "mockfile",
                "validfile.in" => "MOVE\nLEFT\nmOvE\nRIGHT",
                "invalidfile.in" => "MOVE\nLEFT\nmOvE\nASDF"
            ]
        ];

        $this->file_system = vfsStream::setup("root", 444, $directory);
    }

    public function testValidCommands() {
        $commandReader = new CommandFileReader($this->file_system->url()."/mocks/mockfile.in");

        $this->assertTrue($commandReader->isValidCommand("MOVE"));
        $this->assertTrue($commandReader->isValidCommand("LEFT"));
        $this->assertTrue($commandReader->isValidCommand("RIGHT"));
        $this->assertTrue($commandReader->isValidCommand("REPORT"));
        $this->assertTrue($commandReader->isValidCommand("PLACE 1,2,NORTH"));
        $this->assertFalse($commandReader->isValidCommand("INVALID"));
        $this->assertFalse($commandReader->isValidCommand("PLACE 1,2,NOTVALIDDIRECTION"));
        $this->assertFalse($commandReader->isValidCommand("PLACE 1,X,EAST"));
        $this->assertFalse($commandReader->isValidCommand("ASDFrge"));
    }

    public function testValidCommandSequence() {
        $commandReader = new CommandFileReader($this->file_system->url()."/mocks/validfile.in");

        $this->assertEquals("MOVE", $commandReader->getNext());
        $this->assertEquals("LEFT", $commandReader->getNext());
        $this->assertEquals("MOVE", $commandReader->getNext());
        $this->assertEquals("RIGHT", $commandReader->getNext());
    }

    public function testInvalidCommandSequence() {
        $commandReader = new CommandFileReader($this->file_system->url()."/mocks/invalidfile.in");

        $this->assertEquals("MOVE", $commandReader->getNext());
        $this->assertEquals("LEFT", $commandReader->getNext());
        $this->assertEquals("MOVE", $commandReader->getNext());
        $this->assertEquals("INVALID", $commandReader->getNext());
    }
}