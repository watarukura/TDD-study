<?php


namespace App\Money;

use mysql_xdevapi\Warning;

class Sum implements Expression
{

    /**
     * @var Expression $augend
     */
    protected $augend;
    /**
     * @var Expression $addend
     */
    protected $addend;

    public function __construct(Expression $augend, Expression $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    public function reduce(Bank $bank, string $to): Money
    {
        $amount = $this->augend->reduce($bank, $to)->getAmount()
            + $this->addend->reduce($bank, $to)->getAmount();
        return new Money($amount, $to);
    }

    public function plus(Expression $addend): Expression
    {
        return $addend;
    }

    /**
     * @param object $obj
     *
     * @return Sum
     * @throws \Exception
     */
    public static function cast(object $obj): Sum
    {
        if (!($obj instanceof self)) {
            throw new \Exception("argument is not instance of Sum");
        }
        return $obj;
    }
}
