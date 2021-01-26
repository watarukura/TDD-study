<?php

namespace App\Test;

use App\Money\Dollar;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function testMultiplication(): void
    {
        $five = new Dollar(5);
        self::assertEquals(new Dollar(10), $five->times(2));
        self::assertEquals(new Dollar(15), $five->times(3));
    }

    public function testEquality(): void
    {
        $five = new Dollar(5);
        self::assertTrue($five->equals(new Dollar(5)));
        self::assertFalse($five->equals(new Dollar(6)));
    }
}
