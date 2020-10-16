<?php

namespace App;

class Constants{

    public const PLACE = "PLACE";
    public const MOVE = "MOVE";
    public const LEFT = "LEFT";
    public const RIGHT = "RIGHT";
    public const REPORT = "REPORT";
    public const INVALID = "INVALID";

    public const NORTH = "NORTH";
    public const SOUTH = "SOUTH";
    public const EAST = "EAST";
    public const WEST = "WEST";

    public const VALID_COMMANDS = array(
        self::PLACE => "PLACE",
        self::MOVE => "MOVE",
        self::LEFT => "LEFT",
        self::RIGHT => "RIGHT",
        self::REPORT => "REPORT",
        self::INVALID => "INVALID"
    );

    public const VALID_DIRECTIONS = array(
        self::NORTH => "NORTH",
        self::SOUTH => "SOUTH",
        self::EAST => "EAST",
        self::WEST => "WEST"
    );

}