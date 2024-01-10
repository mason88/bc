<?php
/**
 * Abstract class for all cycle types: unicycle, bicycle, tricycle, ...
 * 
 * @author Mason Lee
 */

namespace App\Models;

use App\Enums\Direction;

abstract class Cycle
{
    // max speed of the cycle
    const MAX_SPEED = 10;

    // speed increment to apply after pedalling
    const SPEED_STEP = 1;

    // speed decrement to apply after braking
    const BRAKE_STEP = 1;

    /**
     * Create an instance with initial values.
     *
     * @param Direction $direction Initial direction
     * @param int $speed Initial speed
     */
    public function __construct(protected Direction $direction = Direction::N, protected int $speed = 0)
    {
    }

    /**
     * Get heading direction of the cycle.
     *
     * @return Direction
     */
    public function getDirection(): Direction
    {
        return $this->direction;
    }

    /**
     * Get current speed of the cycle.
     *
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * Turn left by a predermined angle.
     *
     * @return Direction New direction after the turn
     */
    public function turnLeft(): Direction
    {
        return ($this->direction = Direction::turnLeft($this->direction));
    }

    /**
     * Turn right by a predermined angle.
     *
     * @return Direction New direction after the turn
     */
    public function turnRight(): Direction
    {
        return ($this->direction = Direction::turnRight($this->direction));
    }

    /**
     * Pedal on the bike for a predermined speed increment. 
     *
     * @return int New speed after pedalling
     */
    public function pedal(): int
    {
        if (($this->speed + static::SPEED_STEP) >= static::MAX_SPEED)
        {
            return ($this->speed = static::MAX_SPEED);
        }
        else
        {
            return ($this->speed += static::SPEED_STEP);
        }
    }

    /**
     * Apply brake on the bike for a predermined speed decrement. 
     *
     * @return int New speed after braking
     */
    public function brake(): int
    {
        if (($this->speed - static::BRAKE_STEP) <= 0)
        {
            return ($this->speed = 0);
        }
        else
        {
            return ($this->speed -= static::BRAKE_STEP);
        }
    }
}
