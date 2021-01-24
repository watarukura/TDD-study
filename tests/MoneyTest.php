<?php

namespace App\Test;

use App\Money\Dollar;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        $five = new Dollar(5);
        $five->times(2);
        self::assertEquals(10, $five->amount);
    }
}
