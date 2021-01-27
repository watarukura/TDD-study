<?php


namespace App\Money;

class Money
{
    /**
     * @var int $amount
     */
    protected $amount;

    public function equals(Money $money): bool
    {
        return $this->amount === $money->amount
            && get_class($this) === (get_class($money));
    }
}
