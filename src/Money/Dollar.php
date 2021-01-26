<?php

namespace App\Money;

class Dollar
{
    /**
     * @var int $amount
     */
    public $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $multiplier): void
    {
        $this->amount *= $multiplier;
    }
}
