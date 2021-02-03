<?php


namespace App\Money;

class Sum implements Expression
{

    /**
     * @var Money $augend
     */
    protected $augend;
    /**
     * @var Money $addend
     */
    protected $addend;

    public function __construct(Money $augend, Money $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    public function reduce(Bank $bank, string $to): Money
    {
        $amount = $this->augend->getAmount() + $this->addend->getAmount();
        return new Money($amount, $to);
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
