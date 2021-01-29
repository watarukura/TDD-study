<?php

namespace App\Test;

use App\Money\Dollar;
use App\Money\Franc;
use App\Money\Money;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function testMultiplication(): void
    {
        $five = Money::dollar(5);
        self::assertEquals(Money::dollar(10), $five->times(2));
        self::assertEquals(Money::dollar(15), $five->times(3));
    }

    public function testEquality(): void
    {
        self::assertTrue(Money::dollar(5)->equals(Money::dollar(5)));
        self::assertFalse(Money::dollar(5)->equals(Money::dollar(6)));
        self::assertTrue(Money::franc(5)->equals(Money::franc(5)));
        self::assertFalse(Money::franc(5)->equals(Money::franc(6)));

        self::assertFalse(Money::franc(5)->equals(Money::dollar(5)));
    }

    public function testFrancMultiplication(): void
    {
        $five = Money::franc(5);
        self::assertEquals(Money::franc(10), $five->times(2));
        self::assertEquals(Money::franc(15), $five->times(3));
    }
}
