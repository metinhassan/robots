<?php


namespace App;


class Robot
{
    private int $locX;
    private int $locY;
    private string $direction;

    function __construct($locX, $locY, $direction) {
        $this->locX = $locX;
        $this->locY = $locY;
        $this->direction = $direction;
    }

    /**
     * @return int
     */
    public function getLocX(): int
    {
        return $this->locX;
    }

    /**
     * @param int $locX
     */
    public function setLocX(int $locX): void
    {
        $this->locX = $locX;
    }

    /**
     * @return int
     */
    public function getLocY(): int
    {
        return $this->locY;
    }

    /**
     * @param int $locY
     */
    public function setLocY(int $locY): void
    {
        $this->locY = $locY;
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @param string $direction
     */
    public function setDirection(string $direction): void
    {
        $this->direction = $direction;
    }
}