<?php

namespace App\Test;

use App\Money\Bank;
use App\Money\Money;
use App\Money\Sum;
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
        self::assertFalse(Money::franc(5)->equals(Money::dollar(5)));
    }

    public function testCurrency(): void
    {
        self::assertEquals('USD', Money::dollar(1)->currency());
        self::assertEquals('CHF', Money::franc(1)->currency());
    }

    public function testSimpleAddition(): void
    {
        $five = Money::dollar(5);
        $sum = $five->plus($five);
        $bank = new Bank();
        $reduced = $bank->reduce($sum, 'USD');
        self::assertEquals(Money::dollar(10), $reduced);
    }

    public function testReduceReturnsSum(): void
    {
        $five = Money::dollar(5);
        $result = $five->plus($five);
        $sum = Sum::cast($result);
        $bank = new Bank();
        $reduced = $bank->reduce($sum, 'USD');
        self::assertEquals(Money::dollar(10), $reduced);
    }

    public function testReduceSum(): void
    {
        $sum = new Sum(Money::dollar(3), Money::dollar(4));
        $bank = new Bank();
        $result = $bank->reduce($sum, 'USD');
        self::assertEquals(Money::dollar(7), $result);
    }

    public function testReduceMoney(): void
    {
        $bank = new Bank();
        $result = $bank->reduce(Money::dollar(1), 'USD');
        self::assertEquals(Money::dollar(1), $result);
    }

    public function testReduceMoneyDifferentCurrency(): void
    {
        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);
        $result = $bank->reduce(Money::franc(2), 'USD');
        self::assertEquals(Money::dollar(1), $result);
    }

    public function testIdentityRate(): void
    {
        $bank = new Bank();
        self::assertEquals(1, $bank->rate('USD', 'USD'));
    }

    public function testMixedAddition(): void
    {
        $fiveBucks = Money::dollar(5);
        $tenFrancs = Money::franc(10);
        $bank = new Bank();
        $bank->addRate("CHF", "USD", 2);
        $result = $bank->reduce($fiveBucks->plus($tenFrancs), "USD");
        self::assertEquals(Money::dollar(10), $result);
    }

    public function testSumPlusMoney(): void
    {
        $fiveBucks = Money::dollar(5);
        $tenFrancs = Money::franc(10);
        $bank = new Bank();
        $bank->addRate("CHF", "USD", 2);
        $sum = new Sum($fiveBucks, $tenFrancs);
        $sum = $sum->plus($fiveBucks);
        $result = $bank->reduce($sum, "USD");
        self::assertEquals(Money::dollar(15), $result);
    }

    public function testSumTimes(): void
    {
        $fiveBucks = Money::dollar(5);
        $tenFrancs = Money::franc(10);
        $bank = new Bank();
        $bank->addRate("CHF", "USD", 2);
        $sum = new Sum($fiveBucks, $tenFrancs);
        $sum = $sum->times(2);
        $result = $bank->reduce($sum, "USD");
        self::assertEquals(Money::dollar(20), $result);
    }
}
