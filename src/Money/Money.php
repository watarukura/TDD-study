<?php


namespace App\Money;

abstract class Money
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

    abstract public function times(int $multiplier): Money;

    public static function dollar(int $amount): Money
    {
        return new Dollar($amount);
    }
    public static function franc(int $amount): Money
    {
        return new Franc($amount);
    }
}
