<?php

namespace App\Money;

interface Expression
{
    public function reduce(string $to): Money;
}
