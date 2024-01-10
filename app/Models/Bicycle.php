<?php
/**
 * Bicycle class that instantiates and overrides speed constants.
 * 
 * @author Mason Lee
 */

namespace App\Models;

class Bicycle extends Cycle
{
    const MAX_SPEED = 20;

    const SPEED_STEP = 2;

    const BRAKE_STEP = 2;

}
