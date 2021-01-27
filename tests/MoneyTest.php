<?php

namespace App\Test;

use App\Money\Dollar;
use App\Money\Franc;
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
        $five_dollar = new Dollar(5);
        self::assertTrue($five_dollar->equals(new Dollar(5)));
        self::assertFalse($five_dollar->equals(new Dollar(6)));
        $five_franc = new Franc(5);
        self::assertTrue($five_franc->equals(new Franc(5)));
        self::assertFalse($five_franc->equals(new Franc(6)));
    }

    public function testFrancMultiplication(): void
    {
        $five = new Franc(5);
        self::assertEquals(new Franc(10), $five->times(2));
        self::assertEquals(new Franc(15), $five->times(3));
    }
}
