<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Bicycle;
use App\Enums\Direction;

class BicycleTest extends TestCase
{
    public function testInitialValues()
    {
        $bicycle = new Bicycle();

        $this->assertEquals(Direction::N, $bicycle->getDirection());
        $this->assertEquals(0, $bicycle->getSpeed());
    }

    public function testTurnLeft()
    {
        $bicycle = new Bicycle(Direction::N);

        $bicycle->turnLeft();
        $this->assertEquals(Direction::W, $bicycle->getDirection());
    }

    public function testTurnRight()
    {
        $bicycle = new Bicycle(Direction::N);

        $bicycle->turnRight();
        $this->assertEquals(Direction::E, $bicycle->getDirection());
    }

    public function testPedal()
    {
        $bicycle = new Bicycle();

        $bicycle->pedal();
        $this->assertEquals(Bicycle::SPEED_STEP, $bicycle->getSpeed());

        for ($i = 0; $i < 20; $i++) {
            $bicycle->pedal();
        }
        $this->assertEquals(Bicycle::MAX_SPEED, $bicycle->getSpeed());
    }

    public function testBrake()
    {
        $bicycle = new Bicycle();

        $bicycle->pedal();
        $bicycle->brake();
        $this->assertEquals(Bicycle::SPEED_STEP - Bicycle::BRAKE_STEP, $bicycle->getSpeed());
    }
}
