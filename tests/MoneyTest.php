<?php

namespace App\Test;

use App\Money\Franc;
use App\Money\Money;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function testMultiplication(): void
    {
        $five = Money::dollar(5);
        self::assertTrue(Money::dollar(10)->equals($five->times(2)));
        self::assertTrue(Money::dollar(15)->equals($five->times(3)));
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
        self::assertTrue(Money::franc(10)->equals($five->times(2)));
        self::assertTrue(Money::franc(15)->equals($five->times(3)));
    }

    public function testCurrency(): void
    {
        self::assertEquals('USD', Money::dollar(1)->currency());
        self::assertEquals('CHF', Money::franc(1)->currency());
    }

    public function testDifferentClassEquality(): void
    {
        $ten = new Money(10, 'CHF');
        self::assertTrue($ten->equals(new Franc(10, 'CHF')));
    }
}
