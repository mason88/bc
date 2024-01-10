<?php
/**
 * Directions enumeration - can be used for any moving object.
 * 
 * @author Mason Lee
 */

namespace App\Enums;

enum Direction: string
{
    // for simplicity, limited to 4 cardinal directions, but can be expanded
    case N = 'North';
    case E = 'East';
    case S = 'South';
    case W = 'West';

    /**
     * Turn left by 45 degrees.
     *
     * @param Direction $direction Current direction
     * @return Direction New direction
     */
    public static function turnLeft(Direction $direction): Direction
    {
        switch ($direction)
        {
            case self::N : return self::W;
            case self::W : return self::S;
            case self::S : return self::E;
            case self::E : return self::N;
        }
    }

    /**
     * Turn right by 45 degrees.
     *
     * @param Direction $direction Current direction
     * @return Direction New direction
     */
    public static function turnRight(Direction $direction): Direction
    {
        switch ($direction)
        {
            case self::N : return self::E;
            case self::E : return self::S;
            case self::S : return self::W;
            case self::W : return self::N;
        }
    }
}